<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Campus;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model; 


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Categories::all();
        $campus = Campus::select('id','name')->get();
        //return $campus;
        
        //$records = Categories::all();
        return view('categories.index')->with('index', $records)
        ->with('campus', $campus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campus = Campus::select('id','name')->get();
        return view('categories.create')->with('campus', $campus);
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
            'name' => ['required', 'max:50']
        ]);

        $record = new Categories();
        $record->name = $request->name;
        $record->campus_id = $request->campus;
        $record->status = "Active";
        
        $record->save();

        return redirect()->route("categories.index")->with('successMsg', 'Added a record!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route("categories.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::find($id);
        $campus = Campus::select('id','name')->get();
        return view("categories.edit")->with("categories", $categories)
        ->with('campus', $campus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'max:50']
        ]);

        $record = Categories::find($id);
        $record->name = $request->name;
        $record->campus_id = $request->campus;
        $record->status = "Active";

        $record->save();

        return redirect(route('categories.show', $record->id))->with('successMsg', 'Record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::find($id);
        $categories->delete();
        return Redirect()->route('categories.index');
    }
}
