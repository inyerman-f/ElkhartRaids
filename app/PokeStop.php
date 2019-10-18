<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PokeStop extends Model
{
    //
    protected $table = 'pokestop';
    protected $primaryKey = 'pokestop_id';
    public $incrementing = false;
    public $timestamps = false;

}
