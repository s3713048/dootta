<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DtUser extends Model
{
    public function heros() {
        return $this->belongsToMany('App\Hero', 'subscription', 'dt_user_id', 'hero_id');
    }
}