<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gym;

class GymDetails extends Model
{
    //
    protected $table = 'gymdetails';
    protected $primaryKey = 'gym_id';
    public $incrementing = false;
    public $gymControl = false;

    public function get_gym_name($gym_id){

        $name = GymDetails::find($gym_id);
        $name = $name['name'];
        if (is_null($name) or !isset($gym_id)){
            return 'Gym Name Could Not Be Found.';
        }else {
            return $name;
        }
    }
    public function get_gym_id_by_alias($gym_alias) {
        $id =  GymAlias::Where('gym_alias',$gym_alias)->first();

        $id = $id['gym_id'];
        if (is_null($id) or !isset($gym_name)){
            return 'xxxxx';
        }else {
            return $id;
        }
    }

    public function get_gym_image($gym_id){

        $imageURL = GymDetails::find($gym_id);
        $imageURL = $imageURL['url'];
        if ( $imageURL == '' or is_null($imageURL) or empty($imageURL) or !isset($imageURL) or !isset($gym_id)){
            return 'https://vignette.wikia.nocookie.net/pokemon/images/2/29/Gym_Leader_file.png/revision/latest?cb=20180602212712';
        }else {
            return $imageURL;
        }

    }

    public function get_gym_location($gym_id){
        $gym = Gym::find($gym_id);
        $gymLocation = $gym['latitude'].','.$gym['longitude'];
        return $gymLocation;
    }

    public function get_gym_id($gym_id){
        $gym = Gym::find($gym_id);
        $gym = $gym['gym_id'];
        return $gym;
    }

    public function get_gym_details(Raid $raid){
        $url = '/json/pokemon.json';
        $data = file_get_contents($url); // put the contents of the file into a variable
        $mons = json_decode($data, true); // decode the JSON feed
        // $raid->gym_id = $gymDetails->get_gym_id($raid->gym_id);
        $raid->gym_name = $this->get_gym_name($raid->gym_id);
        $raid->gym_image = $this->get_gym_image($raid->gym_id);
        $raid->end = date('h:i:s A',strtotime($raid->end)-(5*60*60));
        if ($raid->pokemon_id > 0){
            $mon_name = $mons[$raid->pokemon_id]['name'];
        }else{
            $mon_name = 'To Be Determined.';
        }
        return $raid;
    }


    public function get_gym_team($gym_id){
        $gym = Gym::find($gym_id);
        $gymTeam = $this->get_team_name($gym['team_id']);
        return $gymTeam;
    }
    public function get_team_name($team_id){

        if ($team_id ==1){
            $name = 'Mystic';
        }elseif($team_id ==2){
            $name = 'Valor';
        }else{
            $name = 'Instinct';
        }
        return $name;
    }

    public function get_team_image($gym_id){
        $gym = Gym::find($gym_id);

        if ($gym['team_id']==1){
            $gymTeam = 'https://res.cloudinary.com/teepublic/image/private/s--e4Q0wC5N--/t_Preview/b_rgb:191919,c_limit,f_jpg,h_630,q_90,w_630/v1468048468/production/designs/577192_2.jpg';
        }elseif ($gym['team_id']==2){
            $gymTeam = 'https://cdn.shopify.com/s/files/1/0580/0973/products/Team_Valor_78642ca1-17ea-48b1-a9f9-d57b5db11d4f_2048x2048.jpg?v=1476194840';
        }else{
            $gymTeam = 'https://res.cloudinary.com/teepublic/image/private/s--Ih5xb5FO--/t_Preview/b_rgb:191919,c_limit,f_jpg,h_630,q_90,w_630/v1467945211/production/designs/576128_1.jpg';
        }
        return $gymTeam;

    }

    public function get_gym_color($gym_id){
        $gym = Gym::find($gym_id);

        if ($gym['team_id']==1){
            $gymTeam = 'blue';
        }elseif ($gym['team_id']==2){
            $gymTeam = 'red';
        }else{
            $gymTeam = 'yellow';
        }

        return $gymTeam;

    }

    public function get_controlling_team(){
        $blue_gyms = Gym::where('team_id',1)->count();
        $red_gyms = Gym::where('team_id',2)->count();
        $yellow_gyms = Gym::where('team_id',3)->count();
        if ( ($blue_gyms > $red_gyms) && ($blue_gyms > $yellow_gyms)){
            return 1;
        }elseif (($red_gyms > $blue_gyms) && ($red_gyms > $yellow_gyms)){
            return 2;
        }elseif(($yellow_gyms >$blue_gyms) && ($yellow_gyms > $blue_gyms)){
            return 3;
        }
    }
    public function get_controlling_team_image($team_id)
    {
        if ($team_id == 1){
            return '/img/background-image.jpg';
        }elseif ($team_id == 2){
            return 'img/background-image.jpg';
        }else{
            return 'img/background-image.jpg';
        }
    }

    public function get_controlling_team_count($team_id){
        $gymcount = Gym::where('team_id',$team_id)->count();
        return $gymcount;

    }

}
