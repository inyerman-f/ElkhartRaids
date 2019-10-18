<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaidBoss extends Model
{
    protected $fillable =['tier','form','pokemon_id','pokemon_name','shiny'];
}
