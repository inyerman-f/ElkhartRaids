<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PokeStopDetails;


class Quest extends Model
{
    //eloquent model settings
    protected $table ='quest';
    protected $primaryKey = 'pokestop_id';
    protected $fillable = ['pokestop_id','pokestop_name','reward','recorded','task','stop_location'];


    public $incrementing = false;
    public $timestamps = false;

    //object vars
    public $pokeStop_name;
    public $pokeStop_location;
    public $pokestop_image;

    public function get_pokestop_image($pokestop_id){
        $location = PokeStopDetails::find($pokestop_id)->url;

        if (is_null($location)){

            return 'https://res.cloudinary.com/teepublic/image/private/s--NQYnw4gc--/t_Preview/b_rgb:ffffff,c_limit,f_jpg,h_630,q_90,w_630/v1468559080/production/designs/585199_1.jpg' ;
        }else {
            return $location;
        }

    }

    public function search_if_quest_exists($pokestop_id)
    {
        $quest = Quest::find($pokestop_id);

        if(is_null($quest)){
            return 0;
        }else{
            return 1;
        }


    }


}
