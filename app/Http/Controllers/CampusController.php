<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model; 

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Campus::all();
        return view('campus.index')->with('index', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campus.create');
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
            'name' => ['required', 'max:50'],
            'address' => ['required', 'max:100']
        ]);

        $record = new Campus();
        $record->name = $request->name;
        $record->address = $request->address;
        $record->status = "Active";
       
        $record->save();

        return redirect()->route("campus.index")->with('successMsg', 'Added a record!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route("campus.index");
        //return view("campus.index")->with("campus", $campus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $campus = Campus::find($id);
        return view("campus.edit")->with("campus", $campus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'max:50'],
            'address' => ['required', 'max:100']
        ]);

        $record = Campus::find($id);
        $record->name = $request->name;
        $record->address = $request->address;
        $record->status = "Active";

        $record->save();

        return redirect(route('campus.show', $record->id))->with('successMsg', 'Record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campus = Campus::find($id);
        $campus->delete();
        return Redirect()->route('campus.index');
    }
}
