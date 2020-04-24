<?php

namespace App\Http\Controllers;

use App\Campus;
use App\LogCampus;
use App\Rules\AlphaSpace;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\DB;
use Validator;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxName(Request $request)
    {
        $query = $request->get('query');
        if($query != null) 
        {
            $data = DB::table('campuses')
                    ->select('id', 'name', 'address')
                    ->where('status', 'Active')
                    ->where('name', 'LIKE', "%{$query}%")
                    ->take(6)
                    ->get(); 
            return response()->json($data);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxNames(Request $request)
    {
        $query = $request->get('query');
        $tmpQuery = explode(',', $query);   
        $arr = array();

        foreach($tmpQuery as $tmp)
        {
            $data = Campus::select('id', 'name', 'address')->where('status', 'active')->where('id', $tmp)->first();
            array_push($arr, $data);
        }
        return response()->json($arr);
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
        $validator = Validator::make($request->all(), 
        [
            'name' => ['required', 'max:100'],
            'address' => ['required', 'max:100']
        ],
        [
            'name.required'  => 'A campus name is required',
            'name.max' => 'The campus name as exceeded the maximum character count of :max',
            'address.required' => 'A campus address is required',
            'address.max' => 'The campus name as exceeded the maximum character count of :max',
        ]);

        if(!$validator->fails())
        {
            $campus = Campus::create([
                'Name' => $request->name,
                'Address' => $request->address,
                'Status' => 'Active'
            ]);          

            LogCampus::create([
                'user_id' => auth()->user()->id,
                'campus_id' => $campus->id,
                'action' => 'Created Campus'
            ]);

            return redirect()->route('campus.index')->with('success', 'You have successfullly added a new campus!');
        }  else return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus)
    {
        return view('campus.single')->with('campus', $campus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus)
    {
        return view('campus.edit')->with('campus', $campus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
        $validator = Validator::make($request->all(), 
        [
            'name' => ['required', 'max:100'],
            'address' => ['required', 'max:100']
        ],
        [
            'name.required'  => 'A campus name is required',
            'name.max' => 'The campus name as exceeded the maximum character count of :max',
            'address.required' => 'A campus address is required',
            'address.max' => 'The campus name as exceeded the maximum character count of :max',
        ]);

        if(!$validator->fails())
        {
            $campus->name = $request->name;
            $campus->address = $request->address;
            $campus->save();
            
            LogCampus::create([
                'user_id' => auth()->user()->id,
                'campus_id' => $campus->id,
                'action' => 'Edited Campus'
            ]);

            return redirect()->route('campus.index')->with('success', 'You have successfullly updated the campus!');
        }  else return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus)
    {
        //Should we deactivate if there is a user with that same campus?    
        $action = null;
        $message = null;

        if($campus->status == 'Active')
        {
            $campus->status = 'Deleted';
            $action = "Deleted Campus";
            $message = "deleted";
        }
        else
        { 
            $campus->status = 'Active';
            $action = "Restored Campus";
            $message = "restored";
        }
        $campus->save();

        LogCampus::create([
            'user_id' => auth()->user()->id,
            'campus_id' => $campus->id,
            'action' => $action
        ]);

        return redirect()->route('campus.index')->with('success', 'You have successfullly ' . $message . ' the campus!');
    }
}
