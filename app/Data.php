<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sensor;

class Data extends Model
{
    protected $table = 'datas';

    public function sensor() {
        return $this->belongsTo('App\Sensor');
    }

    public function getClassName($sensor_id, $data_id){
        $sensor = Sensor::find($sensor_id);
        return "";
        //return "table-danger";
    }
}
