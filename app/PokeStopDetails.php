<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PokeStopDetails extends Model
{
    //eloquent model settings
    protected $table = 'pokestopdetails';
    protected $primaryKey ='pokestop_id';
    protected $fillable = ['url','name'];
    public $incrementing = false;
    public $timestamps = false;

    //object vars
    public $latitude;
    public $longitude;

    public function get_latitude($pokestop_id){
        $stop = PokeStop::find($pokestop_id);
        $lat = $stop['latitude'];
        return $lat;
    }

    public function get_longitude($pokestop_id){
        $stop = PokeStop::find($pokestop_id);
        $lon = $stop['longitude'];
        return $lon;

    }
    public function get_gym_name_by_alias(){

    }

    public function get_pokestop_id_by_alias($stop_name) {
        $id =  PokeStopDetails::where('name',$stop_name)->first();
        $id = $id['pokestop_id'];
        if (is_null($id) or !isset($stop_name)){
            return 'xxxxx';
        }else {
            return $id;
        }
    }

    public function get_pokestop_name($pokestop_id){
        $name = PokeStopDetails::find($pokestop_id);
        $name = $name['name'];
        if (is_null($name) or !isset($pokestop_id)){
            return 'Pokestop Name Could Not Be Found.';
        }else {
            return $name;
        }
    }

    public function get_pokestop_image($pokestop_id){
        $imageURL = PokeStopDetails::find($pokestop_id);
        $imageURL = $imageURL['url'];
        if ( $imageURL == '' or is_null($imageURL) or empty($imageURL) or !isset($imageURL) or !isset($pokestop_id) ){
            return 'https://res.cloudinary.com/teepublic/image/private/s--NQYnw4gc--/t_Preview/b_rgb:ffffff,c_limit,f_jpg,h_630,q_90,w_630/v1468559080/production/designs/585199_1.jpg';
        }else {
            return $imageURL;
        }

    }

    public function get_pokestop_location($pokestop_id){
        $location = PokeStop::find($pokestop_id)->latitude.','.PokeStop::find($pokestop_id)->longitude;

        if (is_null($location)){

            return'This Pokestop Location Cannot be Found :(' ;
        }else {
            return $location;
        }
    }
}
