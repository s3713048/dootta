<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DtUser extends Model
{
    public function subscriptions() {
        return $this->hasMany('App\Subscription', 'dt_user_id');
    }
}