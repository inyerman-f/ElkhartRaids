<?php

namespace App\Http\Controllers;

use App\PokeStop;
use Illuminate\Http\Request;

class PokeStopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pokestops = PokeStop::all();
        return view('pokestops.index')->withPokestops($pokestops);

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
     * @param  \App\PokeStop  $pokeStop
     * @return \Illuminate\Http\Response
     */
    public function show(PokeStop $pokeStop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PokeStop  $pokeStop
     * @return \Illuminate\Http\Response
     */
    public function edit(PokeStop $pokeStop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PokeStop  $pokeStop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PokeStop $pokeStop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PokeStop  $pokeStop
     * @return \Illuminate\Http\Response
     */
    public function destroy(PokeStop $pokeStop)
    {
        //
    }
}
