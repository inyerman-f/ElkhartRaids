<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BotConvo extends Model
{
    //
    protected $fillable = ['user','message', 'channel'];
}
