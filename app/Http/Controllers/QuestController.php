<?php

namespace App\Http\Controllers;

use App\PokeStop;
use App\PokeStopDetails;
use App\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{

    /**
     * Redirect To home Page
     */
    public function home()
    {
        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('quests.index');
    }

    public function show_feed()
    {
       // $quests = \App\Quest::whereRaw('DATE(now()) = DATE(DATE_ADD(last_scanned, INTERVAL '.env('UTC_TIME_DIFFERENCE').' HOUR))')->get();
        $quests = Quest::all();
        $questDetails = new PokeStopDetails();
        foreach ($quests as $quest){
            print $questDetails->get_pokestop_location($quest->pokestop_id).',,'.$quest->reward.','.$quest->pokestop_name.','.$quest->recorded.PHP_EOL;
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pokestop_id)
    {
        $quest = Quest::findOrFail($pokestop_id);
        //return view('quests.create')->withQuest((object) $quest);
        return redirect('/quests');
    }

    public function create_quest($pokestop_id)
    {

        $quest = PokeStop::findOrFail($pokestop_id);
        return view('quests.create')->withQuest((object)$quest);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $quest = new Quest([
            'pokestop_id' => $request->pokestop_id,
            'reward_type' => $request->reward_item,
            'quest_type' => $request->reward_type,
            'reward_amount' => $request->quest_type,
            'goal' => $request->goal,
            'last_scanned' => date('Y-m-d H:i:s', strtotime(time()))
        ]);

        $quest->save();

        return response()->json('successfully added at'.date('Y-m-d H:i:s', strtotime(time())));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quest $quest
     * @return \Illuminate\Http\Response
     */
    public function show(Quest $quest)
    {

        $stopDetails = new PokeStopDetails();
        $quest->pokestop_image = $stopDetails->get_pokestop_image($quest->pokestop_id);
        $quest->pokeStop_name = $stopDetails->get_pokestop_name($quest->pokestop_id);
        $quest->pokeStop_location = $stopDetails->get_pokestop_location($quest->pokestop_id);

        return view('quests.show')->withQuest($quest);

        // return $quest->pokeStop_name;
    }
    public function search_quest ($search_param)
    {
       // return $search_param;
       // return view('quests.search')->withQuest($quest);
        return view('quests.search',['search_param' => $search_param]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function edit(Quest $quest)
    {
        //
        return view('quests.edit')->withQuest($quest);
    }
    public function edit_stop_details($pokestop_id)
    {
        $pokestop = PokeStopDetails::findOrFail($pokestop_id);
        return view('quests.edit_stop_details')->withPokestop((object) $pokestop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quest $quest)
    {
        $quest->goal = $request->goal;
        $quest->reward_type = $request->reward_type;
        $quest->reward_item = $request->reward_item;
        $quest->quest_type = $request->quest_type;
        //$redict = '/quests/'.$quest->pokestop_id;
        $quest->last_scanned = date("Y-m-d H:i:s",strtolower(time()));
        if($quest->save()){
            echo "<script>
            alert('The information was save and you know will be redirected to the quest details.');
            window.location.href='/quests/".$quest->pokestop_id."';"."
            </script>";
        //return redirect('/quests/'.$quest->pokestop_id);

            }else{
        }
    }

    public function update_stop_details(Request $request, $pokestop_id){

        $stop = PokeStopDetails::findOrFail($pokestop_id);
        $stop->name = $request->name;
        $stop->url = $request->url;
        $stop->last_scanned = date("Y-m-d H:i:s",strtolower(time()));
        if($stop->save()){
            echo "<script>
            alert('The information was save and you now will be redirected to the pokestop list.');
            window.location.href='/pokestops"."';"."
            </script>";
            //return redirect('/quests/'.$quest->pokestop_id);

        }else{
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quest $quest)
    {
        //
    }
}
