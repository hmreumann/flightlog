<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Mapper;

class AirportController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show(Airport $airport)
    {
        Mapper::map($airport->latitud, $airport->longitud, ['zoom' => 14]);

        $metar = Http::withHeaders([
            'X-API-Key' => config('services.checkwx.key'),
        ])->withOptions([
            'verify' => base_path('cacert.pem'),
        ])->get('https://api.checkwx.com/metar/lat/'.$airport->latitud.'/lon/'.$airport->longitud.'/radius/100/decoded')->json();

        $taf = Http::withHeaders([
            'X-API-Key' => config('services.checkwx.key'),
        ])->withOptions([
            'verify' => base_path('cacert.pem'),
        ])->get('https://api.checkwx.com/taf/lat/'.$airport->latitud.'/lon/'.$airport->longitud.'/radius/100/decoded')->json();

        return view('airport.show', compact('airport', 'metar', 'taf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function edit(Airport $airport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airport $airport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airport $airport)
    {
        //
    }
}
