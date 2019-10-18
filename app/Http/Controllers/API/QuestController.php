<?php
/**
 * Created by PhpStorm.
 * User: lippert
 * Date: 1/3/19
 * Time: 2:00 PM
 */

namespace App\Http\Controllers\API;
use App\Quest;
use App\PokeStopDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestController extends Controller
{


    public function index()
    {
        $quest = Quest::all();
        return $quest;
    }
    public function store(Request $request)
    {

        $stop = new PokeStopDetails();
        $stop_id = $stop->get_pokestop_id_by_alias($request->pokestop_name);

        $mision = Quest::find($stop_id);
        $location = PokeStopDetails::find($stop_id);
        $location = $location['stop_location'];

        if ( $mision === null ) {
            if($location === null ){$location = 'tbd';}
            $quest = new Quest([
                'pokestop_id' => $stop_id,
                'pokestop_name' => $request->pokestop_name,
                'reward' => $request->reward,
                'task' => $request->task,
                'entered_by' => $request->entered_by,
                'stop_location'=> $location,
                'recorded' => date('Y-m-d H:i:s', time())
            ]);

            $quest->save();

            return response()->json('successfully added');
        }else{

            if($location === null ){$location = 'tbd';}
            $mision->update([
                'pokestop_id' => $stop_id,
                'pokestop_name' => $request->pokestop_name,
                'reward' => $request->reward,
                'task' => $request->task,
                'entered_by' => $request->entered_by,
                'stop_location'=> $location,
                'recorded' => date('Y-m-d H:i:s', time())
            ]);

            return response()->json('successfully updated at: '.date('Y-m-d H:i:s', time()));
        }
    }

    public function show_stops(){
        $stops = PokeStopDetails::all();
        return  $stops;
    }

    public function update(Request $request, Quest $quest)
    {
      /*  $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);*/

        //$quest->update($request->all());
    }
}
