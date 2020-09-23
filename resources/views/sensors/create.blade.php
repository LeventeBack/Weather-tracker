@extends('layouts.app')

@section('content')
    <div class="card border-info mb-5">
        <form action="{{ action('SensorsController@store') }}" method="POST" >
            @csrf
            <div class="card-body">
                <a href="/sensors" class="btn btn-outline-info">Back</a>
                <h3 class="text-center">Create Sensor</h3>
                <div class="form-group">
                    <label for="name">Name:<span>*</span></label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Sensor's name">
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Sensor's location">
                    <small class="form-text text-muted">Make it descriptive</small>
                </div>
                <div class="form-group">
                    <label for="user_id">Sensors owner:</label>
                    @if(count($users) > 0)
                        <select name="user_id" class="custom-select">    
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">
                                    {{$user->name}}
                                    @if($user->isAdmin()) 
                                        (none)
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <hr> 
                <h6>Set your preferred range in which the data is not an alert.</h6>
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
                                    value="15" 
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
                                    value="25" 
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
                                    value="40" 
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
                                    value="55" 
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
                                    value="990" 
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
                                    value="1020" 
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
                    <input type="color" name="color">
                    <br>
                    <button type="submit" class="btn btn-info mt-3 px-3 ">Create Sensor</button>    
                </div>            
            </div>
        </form>
       
    </div> 
@endsection