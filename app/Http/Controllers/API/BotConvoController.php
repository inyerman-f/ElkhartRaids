<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BotConvo;

class BotConvoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $convo = new BotConvo([
            'user' => $request->user,
            'message' => $request->message,
            'channel' => $request->channel,

        ]);

        $convo->save();

        return response()->json('successfully added');
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
     * @param  \App\BotConvo  $botConvo
     * @return \Illuminate\Http\Response
     */
    public function show(BotConvo $botConvo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BotConvo  $botConvo
     * @return \Illuminate\Http\Response
     */
    public function edit(BotConvo $botConvo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BotConvo  $botConvo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BotConvo $botConvo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BotConvo  $botConvo
     * @return \Illuminate\Http\Response
     */
    public function destroy(BotConvo $botConvo)
    {
        //
    }
}
