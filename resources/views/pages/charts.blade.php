@extends('layouts.app')

@section('content')
    <form id="chart-form" action="" method="POST">
        <h3> Alege o dată: </h3>
        <input type="date" id="chart_date">  
        {{-- <br>
        <br>
        <h3> Alege locatiile: </h3>   
        <div class="select-all-container">                        
            <label class="checkbox-container">Select All
                <input id="select-all" type="checkbox" value="All">
                <span class="checkmark"></span>
            </label>
        </div>                         

        <div class="sensor-selection-container">           

        </div>                   

        <div id="chart-error-message"></div> --}}
        <button class="btn" type="submit">Filtrare</button>
    </form> 
    
    <div class='chart-container'>
        <canvas id="tempChart"></canvas>
    </div>

    <div class='chart-container'>
        <canvas id="humidChart"></canvas>
    </div>

    <div class='chart-container'>
        <canvas id="pressChart"></canvas>
    </div>     
@endsection