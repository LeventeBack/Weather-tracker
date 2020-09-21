@extends('layouts.app')

@section('content')
    <div class="text-center">
        <a href="/sensors/create" class="btn btn-info">Add Sensors</a>
    </div>
    @if(count($sensors) > 0)
        <table class="table__custom">   
            <tr>
                <th rowspan="2">Name</th>
                <th rowspan="2">Location</th>
                <th colspan="2">Temperature</th>
                <th colspan="2">Pressure</th>
                <th colspan="2">Humidity</th>
                <th rowspan="2"></th>
            </tr>  
            <tr>
                <th>Min</th>
                <th>Max</th>
                <th>Min</th>
                <th>Max</th>
                <th>Min</th>
                <th>Max</th>
            </tr>
            @foreach ($sensors as $sensor)
                <tr>
                    <td>{{$sensor->name}}</td>
                    <td>{{$sensor->location}}</td>
                    <td>{{$sensor->min_temperature}}&deg;C</td>
                    <td>{{$sensor->max_temperature}}&deg;C</td>
                    <td>{{$sensor->min_humidity}}%</td>
                    <td>{{$sensor->max_humidity}}%</td>
                    <td>{{$sensor->min_pressure}}hPa</td>
                    <td>{{$sensor->max_pressure}}hPa</td>
                <td><a href="/sensors/{{$sensor->id}}" class="btn btn-primary">View</a></td>
                </tr>                        
            @endforeach 
        </table>  
    @else
        <h3>You have no available sensors</h3>
    @endif
@endsection