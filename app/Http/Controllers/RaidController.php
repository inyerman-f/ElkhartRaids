<?php

namespace App\Http\Controllers;

use App\Raid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RaidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$raids = Raid::all()->sortBy('level',0,true);
        //return $raids;
        //$raids = new Raid();
       // $raids = Raid::whereRaw('now() < DATE_ADD(end, INTERVAL '.env('UTC_TIME_DIFFERENCE').' HOUR)')->get();
        return view('raids.index');
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
     * @param  \App\Raid  $raid
     * @return \Illuminate\Http\Response
     */
    public function show(Raid $raid)
    {
        //
        return view('raids.show')->withRaid($raid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Raid  $raid
     * @return \Illuminate\Http\Response
     */
    public function edit(Raid $raid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Raid  $raid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raid $raid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Raid  $raid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raid $raid)
    {
        //
    }
}
