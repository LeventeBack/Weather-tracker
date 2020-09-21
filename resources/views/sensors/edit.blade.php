@extends('layouts.app')

@section('content')
    <div class="card border-info mb-5">
        <form action="{{ action('SensorsController@update', $sensor->id) }}" method="POST" >
            @method('PUT')
            @csrf
            <div class="card-body">
                <a href="/sensors/{{$sensor->id}}" class="btn btn-outline-info">Back</a>
                <h3 class="text-center">Edit Sensor</h3>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Sensor's name" value="{{$sensor->name}}">
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Sensor's location" value="{{$sensor->location}}">
                    <small class="form-text text-muted">Make it descriptive</small>
                </div>
                <hr> 
                <h6>Set your preferred  range in which the data is not an alert.</h6>
                <div class="show_container__custom text-center">
                    <div class="item_group">
                        <img src="/img/temperature.png" alt="">
                        <div class="details">
                            <h5>Air Temperature</h5>
                            <hr>
                            <div class="form-group">
                                <span>Min</span>
                                <input 
                                    type="number" 
                                    step="0.01" 
                                    value="{{$sensor->min_temperature}}" 
                                    name="min_temperature"
                                    min="-40"
                                    max="85"
                                >
                                <span>&deg;C</span>
                            </div>
                            <div class="form-group">
                                <span>Max</span>
                                <input 
                                    type="number" 
                                    step="0.01" 
                                    value="{{$sensor->max_temperature}}" 
                                    name="max_temperature"
                                    min="-40"
                                    max="85"
                                >
                                <span>&deg;C</span>
                            </div>
                        </div>
                    </div>
                    <div class="item_group">
                        <img src="/img/humidity.png" alt="">
                        <div class="details">
                            <h5>Air Humidity</h5>
                            <hr> 
                            <div class="form-group">
                                <span>Min</span>
                                <input 
                                    type="number" 
                                    step="0.01" 
                                    value="{{$sensor->min_humidity}}" 
                                    name="min_humidity"
                                    min="0"
                                    max="100"
                                >
                                <span>%</span>
                            </div>
                            <div class="form-group">
                                <span>Max</span>
                                <input 
                                    type="number" 
                                    step="0.01" 
                                    value="{{$sensor->max_humidity}}" 
                                    name="max_humidity"
                                    min="0"
                                    max="100"
                                >
                                <span>%</span>
                            </div>
                        </div>
                    </div>
                    <div class="item_group">
                        <img src="/img/pressure.png" alt="">
                        <div class="details">
                            <h5>Air Pressure</h5>
                            <hr>
                            <div class="form-group">
                                <span>Min</span>
                                <input 
                                    type="number" 
                                    step="0.01" 
                                    value="{{$sensor->min_pressure}}" 
                                    name="min_pressure"
                                    min="300"
                                    max="1100"
                                >
                                <span>hPa</span>
                            </div>
                            <div class="form-group">
                                <span>Max</span>
                                <input 
                                    type="number" 
                                    step="0.01" 
                                    value="{{$sensor->max_pressure}}" 
                                    name="max_pressure"
                                    min="300"
                                    max="1100"
                                >
                                <span>hPa</span>
                            </div>
                        </div>
                    </div>
                </div> 
                <hr>
                <div class="text-center">
                    <span>Preferred color for charts: </span>
                    <input type="color" name="color" value="{{$sensor->color}}">
                    <br>
                    <button type="submit" class="btn btn-info mt-3 px-3 ">Save Settings</button>    
                </div>            
            </div>
        </form>
       
    </div> 
@endsection