<?php
namespace App\Http\Controllers\API;
use App\GymAlias;
use App\GymDetails;
use App\Http\Controllers\Controller;
use App\MonAlias;
use App\Raid;
use DateTime;
use DateInterval;
use Illuminate\Http\Request;
class RaidController extends Controller
{
    public function store(Request $request)
    {
       // $gym= new GymDetails();
       // $gym_id = $gym->get_gym_id_by_alias($request->gym_name);
        $gym_name = GymAlias::where('gym_alias',$request->gym_name)->first();
        $gym_name = $gym_name['gym_name'];
        $gym_id = GymDetails::where('name',$gym_name)->first();
        $gym_id = $gym_id['gym_id'];
        $boss_name = $request->boss_name;
        $boss_name = MonAlias::where('alias',$boss_name)->first();
        if($boss_name) {
            $boss_name = $boss_name['pokemon_name'];
        }else{
            $boss_name = $request->boss_name;
        }
        if ($gym_id === null){
            $gym_id='xxxxx';
            $gym_name = 'Unknown';
        }
        $location = GymDetails::find($gym_id);
        $location = $location['gym_location'];
        if ($request->hatched == 0 ){
            $hatch_time = new DateTime();
            $hatch_time = $hatch_time->add(new DateInterval('PT' .$request->end_time .'M'));
            $end_time = new DateTime();
            $end_time = $end_time->add(new DateInterval('PT' .($request->end_time + 45).'M'));
        }else {
           // $hatch_time = new DateTime();
           // $hatch_time = $hatch_time->add(new DateInterval('PT' .($request->end_time - 45).'M'));
            $end_time = new DateTime();
            $end_time = $end_time->add(new DateInterval('PT' . $request->end_time . 'M'));
            $hatch_time = $end_time->sub(new DateInterval('PT' .($request->end_time - 45).'M'));
        }
        $incursion = Raid::find($gym_id);
        if ( $incursion === null) {
            if ($location === null ){$location='tbd';}
            $raid = new Raid([
                'gym_id' => $gym_id,
                'gym_name' => $gym_name,
                'boss_name' => $boss_name,
                'hatch_time' =>$hatch_time,
                'end_time' => $end_time,
                'entered_by' => $request->entered_by,
                'hatched'   =>$request->hatched,
                'gym_location' => $location,
                'raid_tier'=>$request->raid_tier,
                'recorded' => date('Y-m-d H:i:s', time())
            ]);
            if($raid->save()) {
                $ret = [
                    'gym_id'=>$gym_id,
                    'boss_name'=>$boss_name,
                    'gym_name'=>$gym_name,
                    'end_time'=>$end_time,
                ];
                $ret = json_encode($ret['gym_id']);
                return response()->json($ret);
            }
        }else{
            if ($location === null ){$location='tbd';}
            $incursion->update([
                'gym_id' => $gym_id,
                'gym_name' => $gym_name,
                'boss_name' => $boss_name,
                'end_time' => $end_time,
                'hatch_time' => $hatch_time,
                'entered_by' => $request->entered_by,
                'hatched'   =>$request->hatched,
                'gym_location' => $location,
                'raid_tier'=>$request->raid_tier,
                'recorded' => date('Y-m-d H:i:s', time())
            ]);
                $ret = [
                    'gym_id'=>$gym_id,
                    'boss_name'=>$boss_name,
                    'gym_name'=>$gym_name,
                    'hatch'=>$hatch_time,
                    'end_time'=>$end_time,
                ];
                $ret = json_encode($ret['gym_id']);
            return response()->json($ret);
        }
    }
    public function show_gyms(){
            $gyms = GymDetails::all();
            return $gyms;
    }
    public function get_gymid($param){
        $gym = GymAlias::where('gym_alias',$param)->first();
        $gym_id = $gym['gym_id'];
        return response()->json($gym_id);
    }
    public function get_gym_name($param){
        $gym = GymAlias::where('gym_alias',$param)->first();
        $gym_name = $gym['gym_name'];
        if ($gym_name) {
            return response()->json($gym_name);
        }
        else
        {
            return response()->json('none-found');
        }
    }
}
