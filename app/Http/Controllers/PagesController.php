<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Sensor;
use DB;

class PagesController extends Controller
{ 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index() {
        return view('pages.index');
    }

    //Admin only
    public function users() {
        // Check if admin
        if(!auth()->user()->isAdmin()){
            return redirect('/')->with('error', 'Unathorized Page');
        }

        $users = User::where('id', '<>', 1)->orderBy('name', 'asc')->paginate(10);
        return view('pages.users')->with('users', $users);
    }

    public function singleuser($id) {
        // Check if admin
        if(!auth()->user()->isAdmin()){
            return redirect('/')->with('error', 'Unathorized Page');
        }
        
        $user = User::find($id);
        $sensors = $user->sensors;
        $showback = true;
        return view('sensors.index')->with(['sensors' => $sensors, 'showback' => $showback]);
    }    
    
    // User only
    public function charts() {        
        $user_id =  auth()->user()->id;
        $user = User::find($user_id);
        return view('pages.charts')->with('sensors', $user->sensors);
    }

    public function chartData(Request $request) {        
        $requestIds = $request->input('sensorIds');
        $day = $request->input('date');

        $start_time = date('Y-m-d H:i:s',strtotime($day));
        $end_time = date('Y-m-d H:i:s',strtotime($day. '23:59:59'));
        //$sensors = Sensor::whereIn('id', $requestIds)->get();

        $all_data = array(
            $temp_data = array(),
            $humid_data = array(),
            $press_data = array()
        );

        foreach ($requestIds as $id) { 
            $sensor = Sensor::find($id);
            if($sensor){
                $raw_data = DB::table('datas')
                ->whereBetween('created_at', [$start_time, $end_time])
                ->where('sensor_id', $id)
                ->orderBy('created_at', 'ASC')
                ->get();

                $single_temp = $single_humid = $single_press = array();

                
                foreach($raw_data as $data){
                    $dataObj = new Axes(date('H:i', strtotime($data->created_at)), $data->temperature);
                    array_push($single_temp, $dataObj); 
                    $dataObj = new Axes(date('H:i', strtotime($data->created_at)), $data->humidity);
                    array_push($single_humid, $dataObj); 
                    $dataObj = new Axes(date('H:i', strtotime($data->created_at)), $data->pressure);
                    array_push($single_press, $dataObj); 
                } 
            
                $tempObj  = new DataSetItem($sensor->name, $single_temp, $sensor->color);
                $humidObj  = new DataSetItem($sensor->name, $single_humid, $sensor->color );
                $pressObj  = new DataSetItem($sensor->name, $single_press, $sensor->color);

                array_push($all_data[0], $tempObj);
                array_push($all_data[1], $humidObj);
                array_push($all_data[2], $pressObj);  
            }
        }
      
        return response()->json([
            'data' => $all_data
        ]);
    }
}

class Axes {
    function __construct($xAxis, $yAxis){
        $this->x=$xAxis;
        $this->y=$yAxis;
    }
}

class DataSetItem {
    public $fill = false; 
    public $showLine = true; 
    public $borderWidth = 1;

    function __construct($labelName, $data, $color){
        $this->label = $labelName;
        $this->data = $data;
        $this->backgroundColor = $color;
        $this->borderColor = $color;
    }
}