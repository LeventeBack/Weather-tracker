<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ErrorMail;
use App\Data;
use App\User;
use DB;

class DatasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->check()){
            if(auth()->user()->isAdmin()){
                $datas = Data::orderBy('created_at', 'desc')->paginate(10);   
            } else {
                $user_id = auth()->user()->id;
                $user = User::find($user_id);
                if(count($user->sensors) > 0){
                    $datas = Data::whereIn('sensor_id', $user->getSensorIds())->orderBy('created_at', 'desc')->paginate(10);
                    
                } else {
                    $datas = [];
                }
            }
            return view('datas.index')->with('datas', $datas);           
        } else {
            return view('auth.login');
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/datas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ARDUINIO REQUEST
        $this->validate($request, [
            'sensor_id' => 'required',
            'temperature' => 'required',
            'humidity' => 'required',
            'pressure' => 'required',
        ]);

        if($request->input('api_key') === env('API_KEY')){
            $data = new Data();
            $data->sensor_id = $request->input('sensor_id'); 
            $data->temperature = $request->input('temperature'); 
            $data->humidity = $request->input('humidity'); 
            $data->pressure = $request->input('pressure'); 
  
            $data->save();            
            // if($data->isError()){
            //     sendErrorMail($data);
            // } 
        } else {
            return 403;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        if(auth()->check()){
            $data = Data::find($id);
            if(auth()->user()->id !== $data->sensor->user->id && !auth()->user()->isAdmin()){
                return redirect('/datas')->with('error', 'Unauthorized Page');
            }
            // TEST MAIL
            // Mail::to('backistvanlevente17@gmail.com')->send(new ErrorMail());

            return view('datas.show')->with('data', $data);
        } else {
            return view('auth.login');
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('/datas');
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
        return redirect('/datas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->check()){
            $data = Data::find($id);

            if(auth()->user()->isAdmin()){
                $data->delete();
                return redirect('/datas')->with('success', 'Data Deleted');
            } else {
                return redirect('/datas')->with('error', 'Unathorized Page');   
            }        
        } else {
                return view('auth.login');
        } 
    }

    // private function sendErrorMail(Data $data){
    //     Mail::to($data->sensor->user->email)->send(new ErrorMail());
    // }
}
