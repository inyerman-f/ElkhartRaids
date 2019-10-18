<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $table = 'gym';
    protected $primaryKey = 'gym_id';
    public $incrementing = false;
    public $timestamps = false;

    //object vars
    public $gym_team;
    public $gym_image;
    public $gym_name;
    public $gym_location;

}
