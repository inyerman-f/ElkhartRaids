<?php

namespace App\Console\Commands;

use App\MonAlias;
use Illuminate\Console\Command;

class AddAlias extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eraids:add_aliases';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        ini_set("allow_url_fopen", 1);

        $url = 'public/json/pokemon.json';
        if($url){

            $data = file_get_contents($url); // put the contents of the file into a variable
            $mons = json_decode($data, true); // decode JSON feed

            // $mons = $mons

            foreach ($mons as $mon){
                $name = $mon['name'];
                $mon_id_url = 'https://pokeapi.co/api/v2/pokemon/' .strtolower($name);

                $headers = get_headers($mon_id_url, 1);
                if ($headers[0] == 'HTTP/1.1 200 OK') {
                    $data = file_get_contents($mon_id_url); // put the contents of the file into a variable
                    $mon = json_decode($data, true); // decode JSON feed
                    $mon_id = $mon['id'];

                } else {
                    echo $name;
                    echo 'shid cuz, some not working';
                    // return response()->json('yo that shid wrong cuz');
                }

                $mon_alias = new MonAlias([
                    'pokemon_id' => $mon_id,
                    'alias' => $name,
                    'pokemon_name' => $name,
                    'form'=> 'normal',
                ]);
                if ($mon_alias->save()) {
                    echo 'buddy '.$name.' was saved\r\n';
                }
            }

        } else {
            return ('yo that shid wrong cuz');
        }
    }
}
