@extends('layouts.app')

@section('content')
    <div class="card border-info mb-5">
        <div class="item-color" style="background-color:{{$sensor->color}}"></div>
        <div class="card-body"> 
            <a href="/sensors" class="btn btn-outline-info text-left "><i class="fas fa-arrow-left mr-1"></i> Back</a>
           
            <h2 class="text-center d-block mx-auto">Settings</h2><br>
            <h4 class="text-center">Name: <strong>{{$sensor->name}}</strong></h4>  
            <h5 class="text-center">Location: <strong>{{$sensor->location}}</strong></h5>
            <hr> 
            <div class="show_container__custom text-center">
                <div class="item_group">
                    <img src="https://i.pinimg.com/originals/b2/36/e4/b236e43db8b644aaee18e4fb3060adc9.png" alt="temperature">
                    <div class="details">
                        <h5>Air Temperature</h5>
                        <hr>
                        <p>Min: {{$sensor->min_temperature}} &deg;C</p>
                        <p>Max: {{$sensor->max_temperature}} &deg;C</p>
                    </div>
                </div>
                <div class="item_group">
                    <img src="https://i.pinimg.com/originals/dd/08/91/dd0891ab46670f3a3358c97599342f3f.png" alt="humidity">
                    <div class="details">
                        <h5>Air Humidity</h5>
                        <hr>
                        <p>Min: {{$sensor->min_humidity}} %</p>
                        <p>Max: {{$sensor->max_humidity}} %</p>
                    </div>
                </div>
                <div class="item_group">
                    <img src="https://i.pinimg.com/originals/5e/11/3a/5e113a8be9457878959029e098706a81.png" alt="pressure">
                    <div class="details">
                        <h5>Air Pressure</h5>
                        <hr>
                        <p>Min: {{$sensor->min_pressure}} hPa</p>
                        <p>Max: {{$sensor->max_pressure}} hPa</p>
                    </div>
                </div>
                
            </div> 
            
            <div class="text-center">
                <a href="/sensors/{{$sensor->id}}/edit" class="btn btn-info mt-3 px-3 text-center custom__center"><i class="fas fa-edit mr-1back"></i> Edit Settings</a>    
            </div>      
       
        </div>
    </div>
    <div class="container mb-5">
        @if(count($sensor->datas) > 0)
            <h3 class="text-center" id="datas">Latest readings</h3>

            <div class="table-responsive">
                <table class="table mt-4 text-center">   
                    <tr class="th__images">
                        <th><img src="https://i.pinimg.com/originals/b2/36/e4/b236e43db8b644aaee18e4fb3060adc9.png" alt="temperature"></th>
                        <th><img src="https://i.pinimg.com/originals/dd/08/91/dd0891ab46670f3a3358c97599342f3f.png" alt="humidity"></th>
                        <th><img src="https://i.pinimg.com/originals/5e/11/3a/5e113a8be9457878959029e098706a81.png" alt="pressure"></th>
                        <th>Read time</th>
                    </tr>  
                    @foreach ($datas as $data)
                            <td>{{$data->temperature}}&deg;C</td>
                            <td>{{$data->humidity}}%</td>
                            <td>{{$data->pressure}}hPa</td>
                            <td>{{$data->created_at}}</td>
                        </tr>                        
                    @endforeach 
                </table>  
            </div>
            {{$datas->fragment('datas')->links()}}
        @else
            <h3 class="text-center">There was no incoming data.</h3>
        @endif
    </div>
 
@endsection