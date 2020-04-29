<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Categories;
use App\LogCategories;
use Illuminate\Http\Request;
use Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Campus $campus)
    {
        $records = Categories::where('campus_id', $campus->id)->get();
        return view('category.index')->with('index', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Campus $campus)
    {   
        $records = Categories::where('campus_id', $campus->id)->where('parent_id', null)->get();
        return view('category.create')->with('index', $records);
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
            'parent' => ['required', 'integer']
        ],
        [
            'name.required' => 'Category name is required',
            'name.max' => 'Category name cannot exceed :max digits',
            'parent.required' => 'Category needs to be indentified',
            'parent.integer' => 'Category parent needs to be an integer'
        ]);

        if(!$validator->fails())
        {
            if($request->parent == 0) $parent = null;
                else $parent = $request->parent;

            $category = Categories::create([
                'name' => $request->name,
                'parent_id' => $parent,
                'campus_id' => $campus->id,
                'status' => 'Active'
            ]);

            LogCategories::create([
                'user_id' => auth()->user()->id,
                'action' => 'Created Category',
                'category_id' => $category->id
            ]);

            return redirect()->route('categories.index', $campus)->with('success', 'You have successfullly added a new category!');
        }  else return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus, Categories $category)
    {
        if($category->campus_id != $campus->id) abort(403);
        $records = Categories::where('campus_id', $campus->id)->where('parent_id', null)->get();
        return view('category.edit')->with('category', $category)->with('index', $records);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus, Categories $category)
    {
        $validator = Validator::make($request->all(), 
        [
            'name' => ['required', 'max:200'],
            'parent' => ['required', 'integer']
        ],
        [
            'name.required' => 'Category name is required',
            'name.max' => 'Category name cannot exceed :max digits',
            'parent.required' => 'Category needs to be indentified',
            'parent.integer' => 'Category parent needs to be an integer'
        ]);

        if(!$validator->fails())
        {
            if($request->parent == 0) $parent = null;
                else $parent = $request->parent;

            if($category->parent_id != $parent)
            {
               if(Categories::where('parent_id', $category->id)->where('status', 'active')->find())
                return redirect()->back()->with('error', 'This category has subcategories. Remove them first.')->withInput();
            }

            $category->name = $request->name;
            $category->parent_id = $parent;
            $category->save();

            LogCategories::create([
                'user_id' => auth()->user()->id,
                'action' => 'Edited Category',
                'category_id' => $category->id
            ]);
                
            return redirect()->route('categories.index', $campus)->with('success', 'You have successfullly updated a the category!');
        }  else return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus, Categories $category)
    {
        $action = null;
        $message = null;

        if($category->parent_id != null)
        {
            if(Categories::where('parent_id', $category->id)->where('status', 'active')->find())
            return redirect()->back()->with('error', 'This category has subcategories. Remove them first.');
        }

        if($category->status == 'Active')
        {
            $category->status = 'Deleted';
            $action = "Deleted Category";
            $message = "deleted";
        }
        else
        { 
            $category->status = 'Active';
            $action = "Restored Category";
            $message = "restored";
        }
        $category->save();

        LogCategories::create([
            'user_id' => auth()->user()->id,
            'category_id' => $category->id,
            'action' => $action
        ]);
        return redirect()->route('categories.index', $campus)->with('success', 'You have successfullly ' . $message . ' the category!');

    }
}
