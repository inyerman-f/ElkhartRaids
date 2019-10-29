<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\MonAlias;
use App\RaidBoss;
use Illuminate\Http\Request;
ini_set("allow_url_fopen", 1);
class RaidBossController extends Controller
{
    function add(Request $request)
    {

        $name = $request->pokemon_name;
        $url = 'https://pokeapi.co/api/v2/pokemon/' . strtolower($name);
        $headers = get_headers($url, 1);
        if ($headers[0] == 'HTTP/1.1 200 OK') {
            $data = file_get_contents($url); // put the contents of the file into a variable
            $mon = json_decode($data, true); // decode JSON feed
            $mon_id = $mon['id'];

        } else {
            return response()->json('yo that shid wrong cuz');
        }

        $boss = new RaidBoss([
            'pokemon_id' => $mon_id,
            'tier' => $request->tier,
            'pokemon_name' => strtolower($name),
            'form'=> $request->form,
            'shiny'=>$request->shiny
        ]);
        if ($boss->save()) {
            return response()->json('successfully added a new raid boss. ' . $mon_id . ' on ' . date('Y-m-d H:i:s', time()));
        }


    }

    function getTier($mon_alias)
    {
        $mon = MonAlias::where('alias', $mon_alias)->first();
        $mon = $mon['pokemon_name'];

        $tier = RaidBoss::where('pokemon_name',$mon)->first();

        if($tier) {
            return response()->json($tier['tier']);
        }else{
            return response()->json('not-found');
        }


    }

}
