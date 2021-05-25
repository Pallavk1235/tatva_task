<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
// use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Event::all();
        return view('events.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $alldata =  $request->all();
        $alldata['recurrence_event'] = implode(',' ,$request->input('recurrence_event'));
        Event::create($alldata);
        return redirect()->back()->with('success', 'Event Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data =  Event::find($id);
        return view('events.event',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edits  = Event::find($id);
        return view('events.update',['edits'=>$edits]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // dd($request->all());
        $event_update = Event::find($request->id);
        $event_update->event_name = $request->event_name;
        $event_update->event_start  = $request->event_start;
        $event_update->event_end = $request->event_end;
        $event_update->recurrence_event = implode(',', $request->recurrence_event);
        $event_update->save();
        return redirect()->back()->with('warning', 'Events Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $event = Event::find($id);
       $event->delete();
       return redirect()->back()->with('warning', $event->event_name. ' Deleted Successfully');
    }
}
