<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Categories;
use App\Food;
use App\LogFood;
use App\Rules\ValidCategory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model; 
use Validator;
use Storage; 

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Campus $campus)
    {
        $categories = collect(); 
        $records = Food::where('campus_id', $campus->id)->where('status', 'Active')->get();
        $all_categories = Categories::where('status', 'Active')->get(); 

        foreach($all_categories as $c){
            if($c->categoriesFood->count() > 0){
                $categories->push($c); 
                if($c->parent_id != null){
                    if(!$categories->contains('id', $c->parent_id)){
                        $categories->push($c->categoriesCategories); 
                    }   
                }
            }
        }

        return view('food.index')->with('index', $records)->with('categories', $categories)->with('campus', $campus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Campus $campus)
    {
        $categories = Categories::select('id','name', 'parent_id')->orderBy('parent_id', 'asc')->get();

        if(count($categories) < 1) return redirect()->route('categories.index', $campus)->with('error', 'This campus does not have any categories. Add a category first!');
        return view('food.create')->with('categories', $categories)->with('campus', $campus); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Campus $campus)
    {
        $validator = Validator::make($request->all(), 
        [
            'name' => ['required', 'max:200'],
            'category' => ['required', new ValidCategory()],
            'shortDescription' => ['required', 'max:256'],
            'description' => ['required', 'max:256'], 
            'ishalal' => ['in:Halal,Haram'],
            'ingredients' => ['required', 'max:191'], 
            'calories' => ['required', 'numeric'], 
            'price' => ['required', 'numeric'],
            'coverphoto' => ['image', 'nullable', 'max:10240'],
        ],
        [
            'name.required' => 'Food name is required',
            'name.max' => 'Food name cannot exceed :max characters',
            'category.required' => 'Food category is required',
            'shortDescription.required' => 'Short description is required',
            'shortDescription.max' => 'Short description cannot exceed :max characters',
            'description.required' => 'Description is required',
            'description.max' => 'Description cannot exceed :max characters',
            'ishalal.in' => 'Food needs to be identified as either halal or haram',
            'ingredients.required' => 'Ingredients is required',
            'ingredients.max' => 'Ingredients cannot exceed :max characters',
            'calories.required' => 'Calorie count is required',
            'calories.numeric' => 'Calorie count must be numeric',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be numeric',
            'coverphoto.image' => 'Food image needs to be an image',
            'coverphoto.max' => 'Food image exceeded the maximum file size'
        ]);

        if(!$validator->fails())
        {
            if($request->hasfile('coverphoto'))
            {
                $file = $request->file('coverphoto')->getClientOriginalName();
                $name = pathinfo($file, PATHINFO_FILENAME);
                $ext = $request->file('coverphoto')->getClientOriginalExtension();
                $filename = $file . '_' . time() . '.' . $ext;
                $path = $request->file('coverphoto')->storeAs('public/foodphotos', $filename);
            } else $filename = null;

            if($request->ishalal == 'Halal'){
                $is_halal = "Halal"; 
            } else {
                $is_halal = "Haram"; 
            }

            $food = Food::create([
                'name' => $request->name,
                'category_id' => $request->category, 
                'shortDescription' => $request->shortDescription,
                'description' => $request->description, 
                'ingredients' => $request->ingredients,
                'calories' => $request->calories,
                'isHalal' => $is_halal,
                'price' => $request->price,
                'campus_id' => $campus->id,
                'coverphoto' => $filename,
                'status' => 'Active'
            ]);
            
            LogFood::create([
                'user_id' => auth()->user()->id,
                'food_id' => $food->id,
                'action' => 'Created Food'
            ]);
            return redirect()->route('food.index', $campus)->with('success', 'You have successfullly added a new food item!');
        }  else return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus, Food $food)
    {
        return redirect()->route("food.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus, Food $food)
    {
        if($food->campus_id != $campus->id) abort(403);
        if($food->status == "Deleted") abort(403);
         
        $categories = Categories::select('id','name', 'parent_id')->orderBy('parent_id', 'asc')->get();
        $ingredients = explode(', ', $food->ingredients); 
        return view('food.edit')->with('food', $food)->with('campus', $campus)->with('categories', $categories)->with('ingredients', $ingredients); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus, Food $food)
    {
        $validator = Validator::make($request->all(), 
        [
            'name' => ['required', 'max:200'],
            'category' => ['required', new ValidCategory()],
            'shortDescription' => ['required', 'max:256'],
            'description' => ['required', 'max:256'], 
            'ishalal' => ['in:Halal,Haram'],
            'ingredients' => ['required', 'max:191'], 
            'calories' => ['required', 'numeric'], 
            'price' => ['required', 'numeric'],
            'coverphoto' => ['image', 'nullable', 'max:10240'],
        ],
        [
            'name.required' => 'Food name is required',
            'name.max' => 'Food name cannot exceed :max characters',
            'category.required' => 'Food category is required',
            'shortDescription.required' => 'Short description is required',
            'shortDescription.max' => 'Short description cannot exceed :max characters',
            'description.required' => 'Description is required',
            'description.max' => 'Description cannot exceed :max characters', 
            'ishalal.in' => 'Food needs to be identified as either halal or haram',
            'ingredients.required' => 'Ingredients is required',
            'ingredients.max' => 'Ingredients cannot exceed :max characters',
            'calories.required' => 'Calorie count is required',
            'calories.numeric' => 'Calorie count must be numeric',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be numeric',
            'coverphoto.image' => 'Food image needs to be an image',
            'coverphoto.max' => 'Food image exceeded the maximum file size'
        ]);

        if(!$validator->fails())
        {
            if($request->ishalal == 'Halal'){
                $is_halal = "Halal"; 
            } else {
                $is_halal = "Haram"; 
            }

            $food->name = $request->name; 
            $food->category_id = $request->category;
            $food->shortDescription = $request->shortDescription;
            $food->description = $request->description;  
            $food->ingredients = $request->ingredients; 
            $food->calories = $request->calories; 
            $food->price = $request->price;
            $food->isHalal = $is_halal;

            if($request->hasfile('coverphoto'))
            {
                if ($food->coverphoto != "" || $food->coverphoto != null){
                    Storage::delete('public/coverphotos/' . $food->coverphoto);
                }

                $file = $request->file('coverphoto')->getClientOriginalName();
                $name = pathinfo($file, PATHINFO_FILENAME);
                $ext = $request->file('coverphoto')->getClientOriginalExtension();
                $filename = $file . '_' . time() . '.' . $ext;
                $path = $request->file('coverphoto')->storeAs('public/foodphotos', $filename);

                $food->coverphoto = $filename; 
            }

            $food->save(); 

            LogFood::create([
                'user_id' => auth()->user()->id,
                'food_id' => $food->id,
                'action' => 'Edited Food'
            ]);

            return redirect()->route('food.index', $campus)->with('success', 'You have successfullly updated the food item!');
        }  else return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus, Food $food)
    {
        $food->status = 'Deleted'; 
        $food->save(); 

        LogFood::create([
            'user_id' => auth()->user()->id,
            'food_id' => $food->id,
            'action' => 'Deleted Food'
        ]);
        return Redirect()->route('food.index', $campus)->with('success', 'You have successfullly deleted the food!');
    }
}
