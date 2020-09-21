@extends('layouts.app')

@section('content')
    <div class="card border-info">
        <div class="item-color" style="background-color:{{$sensor->color}}"></div>
        <div class="card-body">
            <a href="/sensors" class="btn btn-outline-info text-left">Back</a>
            <h4 class="text-center">Name: <strong>{{$sensor->name}}</strong></h4>  
            <h5 class="text-center">Location: <strong>{{$sensor->location}}</strong></h5>
            <hr> 
            <div class="show_container__custom text-center">
                <div class="item_group">
                    <img src="/img/temperature.png" alt="">
                    <div class="details">
                        <h5>Air Temperature</h5>
                        <hr>
                        <p>Min: {{$sensor->min_temperature}} &deg;C</p>
                        <p>Max: {{$sensor->max_temperature}} &deg;C</p>
                    </div>
                </div>
                <div class="item_group">
                    <img src="/img/humidity.png" alt="">
                    <div class="details">
                        <h5>Air Humidity</h5>
                        <hr>
                        <p>Min: {{$sensor->min_humidity}} %</p>
                        <p>Max: {{$sensor->max_humidity}} %</p>
                    </div>
                </div>
                <div class="item_group">
                    <img src="/img/pressure.png" alt="">
                    <div class="details">
                        <h5>Air Pressure</h5>
                        <hr>
                        <p>Min: {{$sensor->min_pressure}} hPa</p>
                        <p>Max: {{$sensor->max_pressure}} hPa</p>
                    </div>
                </div>
                
            </div> 
            
            <div class="text-center">
                <a href="/sensors/{{$sensor->id}}/edit" class="btn btn-info mt-3 px-3 text-center custom__center">Edit Settings</a>    
            </div>      
       
        </div>
    </div>
    <!-- SENSOR INFO WITH PAGINATION -->
 
@endsection