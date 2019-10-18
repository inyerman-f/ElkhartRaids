<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raid extends Model
{
    //
    protected $table = 'raid';
    protected $primaryKey = 'gym_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['gym_id','boss_name','gym_name','end_time','gym_location','raid_tier'];

    public $gym_name;
    public $gym_image;
    public $boss_image;
    public $gym_location;
    public $controlling_team;

    public function get_all_raids(){
        $raids = Raid::all()->sortBy('level',0,true);
        return $raids;
    }


    public function get_current_raids(){

    }

}
