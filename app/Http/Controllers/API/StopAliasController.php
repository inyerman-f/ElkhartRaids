<?php


namespace App\Http\Controllers\API;
use App\PokeStopDetails;
use App\StopAlias;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StopAliasController extends Controller
{
    public function add(Request $request){
     $nom = $request->pokestop_name;
     $stop = PokeStopDetails::where('name',$nom)->first();
     $id = $stop['pokestop_id'];
        $alias = new StopAlias([
            'pokestop_id'=>$id,
            'pokestop_name'=>$request->pokestop_name,
            'pokestop_alias'=>$request->pokestop_alias
        ]);
       if($alias->save()){
           return response()->json('successfully added an alias for '.$id.' on '.date('Y-m-d H:i:s', time()));
       }
    }

}
