<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;
use App\User;

class SensorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdmin()){
            $sensors = Sensor::orderBy('created_at', 'desc')->get();           
            return view('sensors.index')->with('sensors', $sensors);
        } else {
            $user_id =  auth()->user()->id;
            $user = User::find($user_id);
            return view('sensors.index')->with('sensors', $user->sensors);
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check if admin
        if(!auth()->user()->isAdmin()){
            return redirect('/sensors')->with('error', 'Unathorized Page');
        }
        
        // Get user list
        $users = User::all();

        return view('sensors.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if admin
        if(!auth()->user()->isAdmin()){
            return redirect('/sensors')->with('error', 'Unathorized Page');
        }

        $this->validate($request, [
            'user_id' => 'required',
            'name' => 'required',
            'location' => 'required',
            'min_temperature' => 'required',
            'max_temperature' => 'required',
            'min_humidity' => 'required',
            'max_humidity' => 'required',
            'min_pressure' => 'required',
            'max_pressure' => 'required',
            'color' => 'required'
        ]);

        $sensor = new Sensor();
        $sensor->user_id = $request->input('user_id');
        $sensor->name = $request->input('name');
        $sensor->location = $request->input('location');
        $sensor->min_temperature = $request->input('min_temperature');
        $sensor->max_temperature = $request->input('max_temperature');
        $sensor->min_humidity = $request->input('min_humidity');
        $sensor->max_humidity = $request->input('max_humidity');
        $sensor->min_pressure = $request->input('min_pressure');
        $sensor->max_pressure = $request->input('max_pressure');
        $sensor->color = $request->input('color');

        $sensor->save();

        return redirect ('/sensors')->with('success', 'Sensor Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sensor = Sensor::find($id);
        
        // Check for correct user
        if($sensor && (auth()->user()->id === $sensor->user_id || auth()->user()->isAdmin())) {
            return view('sensors.show')->with('sensor', $sensor);
        }
        return redirect('/sensors')->with('error', 'Unathorized Page');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sensor = Sensor::find($id);

        if($sensor && (auth()->user()->id === $sensor->user_id || auth()->user()->isAdmin())) {
            return view('sensors.edit')->with('sensor', $sensor);
        }

        return redirect('/sensors')->with('error', 'Unathorized Page');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'min_temperature' => 'required',
            'max_temperature' => 'required',
            'min_humidity' => 'required',
            'max_humidity' => 'required',
            'min_pressure' => 'required',
            'max_pressure' => 'required',
            'color' => 'required'
        ]);

        $sensor = Sensor::find($id);
        $sensor->name = $request->input('name');
        $sensor->location = $request->input('location');
        $sensor->min_temperature = $request->input('min_temperature');
        $sensor->max_temperature = $request->input('max_temperature');
        $sensor->min_humidity = $request->input('min_humidity');
        $sensor->max_humidity = $request->input('max_humidity');
        $sensor->min_pressure = $request->input('min_pressure');
        $sensor->max_pressure = $request->input('max_pressure');
        $sensor->color = $request->input('color');

        $sensor->save();
        return redirect ('/sensors/'.$id)->with('success', 'Sensor Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* CODE TO DESTROY */
        if(auth()->user()->isAdmin()){
            //return '<h1>Delete page</h1>';
        }

    }
}
