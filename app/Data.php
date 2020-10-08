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

    public function getClassName(){
        $sensor = Sensor::find($this->sensor_id);
        $classString = "";
        if($this->isError()){
            $classString .= "table-danger";
        } 
        if($sensor->max_temperature < $this->temperature || $sensor->min_temperature > $this->temperature){
            $classString .= " tmp";
        } 
        if($sensor->max_humidity < $this->humidity || $sensor->min_humidity > $this->humidity){
            $classString .= " hmd";
        } 
        if($sensor->max_pressure < $this->pressure || $sensor->min_pressure > $this->pressure){
            $classString .= " prs";
        } 
        return $classString; 
    }

    public function getButtonClassName() {
        if($this->isError()) {
            return " btn-outline-danger ";
        }
        return " btn-outline-info ";
    }

    private function isError(){
        $sensor = Sensor::find($this->sensor_id);
        return ($sensor->max_temperature < $this->temperature || $sensor->min_temperature > $this->temperature) || ($sensor->max_humidity < $this->humidity || $sensor->min_humidity > $this->humidity) || $sensor->max_pressure < $this->pressure || $sensor->min_pressure > $this->pressure;
    }
}
