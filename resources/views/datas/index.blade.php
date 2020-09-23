@extends('layouts.app')

@section('content')
    @if(count($datas) > 0)
        <h2>Latest data</h2>
        <div class="table-responsive">
            <table class="table mt-4 text-center">   
                <tr class="th__images">
                    <th>Sensor name</th>
                    <th><img src="{{asset("storage/img/temperature.png")}}" alt="temperature"></th>
                    <th><img src="{{asset("storage/img/humidity.png")}}" alt="humidity"></th>
                    <th><img src="{{asset("storage/img/pressure.png")}}" alt="pressure"></th>
                    <th>Read time</th>
                </tr>  
                @foreach ($datas as $data)
                    <tr>
                        <td>{{$data->sensor->name}}</td>
                        <td>{{$data->temperature}}&deg;C</td>
                        <td>{{$data->humidity}}%</td>
                        <td>{{$data->pressure}}hPa</td>
                        <td>{{$data->created_at}}
                            <a href="/datas/{{$data->id}}" class="btn btn-outline-info float-right">View</a>
                        </td>
                    </tr>                        
                @endforeach 
            </table>  
        </div>
    @else
        <h3>You have no available datas.</h3>
    @endif
@endsection
