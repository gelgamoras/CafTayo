<?php

namespace App\Http\Controllers;

use Validator;
use App\Subscribers;
use Illuminate\Http\Request;
use App\Rules\AlphaSpace;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $record = Subscribers::all();
       return view('subscribers.index')->with('index', $record);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscribers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $randomPW = Str::random(10);

        $this->validate($request, [
            'email' => ['required', 'email', 'unique:subscribers'],
        ],
        [
            'email.required' => 'User must have a valid email address'
        ]);
        
        $record = new Subscribers();
        $record->email = $request->email;
        $record->hash = $randomPW;
        $record->status = "Active";
       
        $record->save();

        return redirect()->route("subscribers.index")->with('successMsg', 'Added a record!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribers $subscribers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscribers $subscribers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscribers $subscribers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscribers $subscribers)
    {
        //
    }
}
