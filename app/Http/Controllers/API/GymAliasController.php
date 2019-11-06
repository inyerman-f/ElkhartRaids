<?php

namespace App\Http\Controllers\API;


use App\GymAlias;
use App\GymDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GymAliasController extends Controller
{
    public function add(Request $request){
        $nom = $request->gym_name;
        $gym = GymDetails::where('name',$nom)->first();
        $id = $gym['gym_id'];
        $alias = new GymAlias([
            'gym_id'=>$id,
            'gym_name'=>$request->gym_name,
            'gym_alias'=>$request->gym_alias
        ]);
        if($alias->save()){
            return response()->json('successfully added an alias for gymId: '.$id.' on '.date('Y-m-d H:i:s', time()));
        }else{
            return response()->json('it didnt work');
        }
    }
    public function show_all()
    {
        $aliases = GymAlias::all();
        return response()->json($aliases);
    }
    public function show_gym_aliases($gym_name)
    {
        $gym = GymAlias::where('gym_name',$gym_name)->get();
        if($gym){
            return $gym;
        }else{
            return response()->json('We could not find this gym :(');
        }

    }
}
