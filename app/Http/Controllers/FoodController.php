<?php

namespace App\Http\Controllers;

use App\Food;
use App\Campus;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model; 

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Food::all();
        $categories = Categories::select('id','name')->get(); 
        $campus = Campus::select('id','name')->get();
        return view('food.index')->with('index', $records)
            ->with('categories', $categories)
            ->with('campus', $campus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::select('id','name')->get();
        $campus = Campus::select('id','name')->get();
        return view('food.create')->with('categories', $categories)
            ->with('campus', $campus); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:200'], 
            'shortDescription' => ['required', 'max:256'],
            'description' => ['required', 'max:256'], 
            'ingredients' => ['required', 'max:191'], 
            'calories' => ['required', 'numeric'], 
            'price' => ['required', 'numeric'],
            //'image' => ['required', 'image', 'max:2048'],
            'coverphoto' => ['image', 'nullable', 'max:10240'],
        ]); 

        /*$image = $request->file('image');
        $image_name = rand() . '_' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);*/

        $record = new Food(); 
        $record->name = $request->name; 
        $record->category_id = $request->categories;
        $record->campus_id = $request->campus;
        $record->shortDescription = $request->shortDescription;
        $record->description = $request->description;  
        $record->ingredients = $request->ingredients; 
        $record->calories = $request->calories; 
        $record->price = $request->price;
        //$record->coverphoto = $request->image;
        
        //$record->$coverphoto = time().'.'.$request->image->extension();  
   
        //$request->image->move(public_path('images'));

        if($request->hasFile('coverphoto'))
            {
                if ($record->coverphoto != "" || $record->coverphoto != null){
                    Storage::delete('public/coverphotos/' . $record->coverphoto);
                }
            
                $file = $request->file('coverphoto')->getClientOriginalName();
                $name = pathinfo($file, PATHINFO_FILENAME);
                $ext = $request->file('coverphoto')->getClientOriginalExtension();
                $filename = $file . '_' . time() . '.' . $ext;
                $path = $request->file('coverphoto')->storeAs('public/images', $filename);

                $record->coverphoto = $filename;
            } 

        $halal = $request->ishalal; 
        if($halal != null){
            $record->isHalal = "Halal"; 
        } else {
            $record->isHalal = "Haram"; 
        }

        $featured = $request->isfeatured; 
        if($featured != null){
            $record->isFeatured = "YES"; 
        } else {
            $record->isFeatured = "NO"; 
        }

        $record->status = "Active"; 
        $record->save(); 

        return redirect()->route("food.index")->with('successMsg', 'Added a record!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route("food.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        $campus = Campus::select('id','name')->get();
        $categories = Categories::select('id','name')->get();
        return view('food.edit')
            ->with('food', $food)
            ->with('campus', $campus)
            ->with('categories', $categories); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'max:200'], 
            'shortDescription' => ['required', 'max:256'],
            'description' => ['required', 'max:256'], 
            'ingredients' => ['required', 'max:191'], 
            'calories' => ['required', 'numeric'], 
            'price' => ['required', 'numeric'],
        ]); 

        $record = Food::find($id);
        $record->name = $request->name; 
        $record->shortDescription = $request->shortDescription;
        $record->description = $request->description;  
        $record->ingredients = $request->ingredients; 
        $record->calories = $request->calories; 
        $record->price = $request->price;
        
        $halal = $request->ishalal; 
        if($halal != null){
            $record->isHalal = "Halal"; 
        } else {
            $record->isHalal = "Haram"; 
        }

        $featured = $request->isfeatured; 
        if($featured != null){
            $record->isFeatured = "YES"; 
        } else {
            $record->isFeatured = "NO"; 
        }

        $record->status = "Active"; 
        $record->save(); 

        return redirect()->route("food.show", $record->id)->with('successMsg', 'Edited a record!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();
        return Redirect()->route('food.index');
    }
}
