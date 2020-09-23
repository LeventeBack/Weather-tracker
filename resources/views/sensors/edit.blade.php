@extends('layouts.app')

@section('content')
    <div class="card border-info mb-5">
        <form action="{{ action('SensorsController@update', $sensor->id) }}" method="POST" >
            @method('PUT')
            @csrf
            <div class="card-body">
                <a href="/sensors/{{$sensor->id}}" class="btn btn-outline-info">Back</a>
                <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModal">
                    Delete Sensor
                </button>
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
                @if(auth()->user()->isAdmin())
                    <div class="form-group">
                        <label for="user_id">Sensors owner:</label>
                        @if(count($users) > 0)
                        <select name="user_id" class="custom-select">    
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}"
                                        @if($user->id == $sensor->user_id)
                                            selected
                                        @endif
                                    >
                                        {{$user->name}}
                                        @if($user->isAdmin()) 
                                        (none)
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                @else
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                @endif
                <hr> 
                <h6>Set your preferred  range in which the data is not an alert.</h6>
                <div class="show_container__custom text-center">
                    <div class="item_group">
                        <img src="https://i.pinimg.com/originals/b2/36/e4/b236e43db8b644aaee18e4fb3060adc9.png" alt="temperature">
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
                        <img src="https://i.pinimg.com/originals/dd/08/91/dd0891ab46670f3a3358c97599342f3f.png" alt="humidity">
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
                        <img src="https://i.pinimg.com/originals/5e/11/3a/5e113a8be9457878959029e098706a81.png" alt="pressure">
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

        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Sensor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this sensor. All the data will be inaccessible!
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form class="float-right" action="{{ action('SensorsController@destroy', $sensor->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection