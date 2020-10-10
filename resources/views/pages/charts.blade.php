@extends('layouts.app')

@section('content')
    @if(count($sensors) > 0)
        {{-- <div id="chart-error-message" class="alert alert-danger"></div> --}}
        <form id="chart-form">
            <div class="form-group">
                <h3> Select a date: </h3>
                <input type="date" id="chart_date"> 
            </div>
            <div class="form-group">
                <h3> Select the sensors: </h3>  
                <div>
                    <input class="styled-checkbox" id="select-all" type="checkbox" value="all">
                    <label for="select-all">Select All</label>           
                </div>    
                <ul class="checkbox-list list-inline mt-2">
                    @foreach ($sensors as $sensor)
                        <li class="checkbox-list-item">
                            <input class="styled-checkbox" id="{{$sensor->id}}" type="checkbox" value="{{$sensor->id}}">
                            <label for="{{$sensor->id}}">{{$sensor->name}}</label>           
                        </li>           
                    @endforeach 
                </ul>   
            </div>
            <div class="form-group">
                <button class="btn btn-info" type="submit">Show selected</button>
            </div>
        </form> 


        <div id="chart-warning-message" class="alert alert-warning d-none text-center mt-5">
            There is no recorded data from the selected sensors on the selected day. 
        </div>

        <div id="chart-error-message" class="alert alert-danger d-none text-center mt-5">
            You must select at least one sensor!
        </div>

        <h4 id="loading" class="text-center mt-5"></h4>
        
        <section id="charts-section">
            <div class='chart-container'>
                <canvas id="tempChart"></canvas>
            </div>

            <div class='chart-container'>
                <canvas id="humidChart"></canvas>
            </div>

            <div class='chart-container'>
                <canvas id="pressChart"></canvas>
            </div>    
        </section>

 
    @else
        <h2>You have no available sensors.</h2>
    @endif
@endsection