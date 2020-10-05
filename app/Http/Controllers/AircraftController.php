<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use Illuminate\Http\Request;

class AircraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aircraft.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'manufacturer' => 'required|string|max:30',
            'model' => 'required|string|max:30',
            'type_designator' => 'required|string|max:30',
            'description' => 'required|string|max:30',
            'engine_type' => 'required|string|max:30',
            'engine_count' => 'required|integer|max:10',
            'WTC' => 'required|string|max:30',
            'registration' => 'required|string|max:30|unique:aircraft'
        ]);

        $aircraft = Aircraft::create([
            'manufacturer' => $request['manufacturer'],
            'model' => $request['model'],
            'type_designator' => $request['type_designator'],
            'description' => $request['description'],
            'engine_type' => $request['engine_type'],
            'engine_count' => $request['engine_count'],
            'WTC' => $request['WTC'],
            'registration' => $request['registration']
        ]);

        return redirect()->route('aircraft.show',['aircraft'=>$aircraft]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function show(Aircraft $aircraft)
    {
        return view('aircraft.show',compact('aircraft'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function edit(Aircraft $aircraft)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aircraft $aircraft)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aircraft $aircraft)
    {
        //
    }
}
