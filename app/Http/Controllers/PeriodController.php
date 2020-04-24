<?php

namespace App\Http\Controllers;

use App\Period;
use App\LogPeriod;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Period::all();
        return view('period.index')->with('index', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('period.create');
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
            'period' => ['required', 'max:50'],
            'timestart' => ['required', 'date_format:H:i'],
            'timeend' => ['required', 'date_format:H:i', 'after:timestart']
        ],
        [
            'period.required' => 'Period name is required',
            'period.max' => 'Period name can only have a maximum of :max',
            'timestart' => 'Period start is required',
            'timestart.date_format' => 'Period start must be HH:MM',
            'timeend' => 'Period end is required',
            'timeend.date_format' =>  'Period end must be HH:MM',
            'timeend.after' => 'Period end nust be after your period starts'
        ]);

        if(!$validator->fails())
        {
            $period = Period::create([
                'period' => $request->period,
                'start' => $request->timestart,
                'end' => $request->timeend,
                'status' => 'Active'
            ]);          

            LogPeriod::create([
                'user_id' => auth()->user()->id,
                'period_id' => $period->id,
                'action' => 'Created Period'
            ]);

            return redirect()->route('period.index')->with('success', 'You have successfullly added a new period!');
        }  else return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        return view('period.single')->with('campus', $campus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        return view('campus.edit')->with('campus', $campus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        $validator = Validator::make($request->all(), 
        [
            'period' => ['required', 'max:50'],
            'timestart' => ['required', 'date_format:H:i'],
            'timeend' => ['required', 'date_format:H:i', 'after:timestart']
        ],
        [
            'period.required' => 'Period name is required',
            'period.max' => 'Period name can only have a maximum of :max',
            'timestart' => 'Period start is required',
            'timestart.date_format' => 'Period start must be HH:MM',
            'timeend' => 'Period end is required',
            'timeend.date_format' =>  'Period end must be HH:MM',
            'timeend.after' => 'Period end nust be after your period starts'
        ]);

        if(!$validator->fails())
        {
            $period->period = $request->period;
            $period->start = $request->timestart;
            $period->end = $request->timeend;
            $period->save();
            
            LogPeriod::create([
                'user_id' => auth()->user()->id,
                'period_id' => $period->id,
                'action' => 'Updated Period'
            ]);

            return redirect()->route('campus.index')->with('success', 'You have successfullly updated the period!');
        }  else return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        $action = null;
        $message = null;

        if($period->status == 'Active')
        {
            $period->status = 'Deleted';
            $action = "Deleted Period";
            $message = "deleted";
        }
        else
        { 
            $period->status = 'Active';
            $action = "Restored Period";
            $message = "restored";
        }
        $campus->save();

        LogPeriod::create([
            'user_id' => auth()->user()->id,
            'period_id' => $campus->id,
            'action' => $action
        ]);

        return redirect()->route('period.index')->with('success', 'You have successfullly ' . $message . ' the period!');

    }
}
