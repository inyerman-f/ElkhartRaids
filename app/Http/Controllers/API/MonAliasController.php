<?php


namespace App\Http\Controllers\API;


use App\MonAlias;
use Illuminate\Http\Request;

class MonAliasController
{
    function add(Request $request)
    {
     //   ['pokemon_id','pokemon_name','form','alias']
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

        $boss = new MonAlias([
            'pokemon_id' => $mon_id,
            'alias' => $request->alias,
            'pokemon_name' => strtolower($name),
            'form'=> $request->form,
        ]);
        if ($boss->save()) {
            return response()->json('successfully added a new alias. ' . $request->alias . ' for '.$name.' on '. date('Y-m-d H:i:s', time()));
        }


    }

    function get($mon_alias)
    {
        $mon = MonAlias::where('alias', $mon_alias)->first();
        if($mon) {
            return response()->json($mon['pokemon_name']);
        }else{
            return response()->json('not-found');
        }


    }

}
