<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function datas(){
        return $this->hasMany('App\Data');
    }

    public function getIds() {
        return [1,2,3];
    }
}
