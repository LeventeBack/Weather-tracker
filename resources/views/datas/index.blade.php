@extends('layouts.app')

@section('content')
    @if(count($datas) > 0)
        <h2>Latest data</h2>
        <div class="table-responsive">
            <table class="table mt-4 text-center">   
                <tr class="th__images">
                    <th>Sensor name</th>
                    <th><img src="https://i.pinimg.com/originals/b2/36/e4/b236e43db8b644aaee18e4fb3060adc9.png" alt="temperature"></th>
                    <th><img src="https://i.pinimg.com/originals/dd/08/91/dd0891ab46670f3a3358c97599342f3f.png" alt="humidity"></th>
                    <th><img src="https://i.pinimg.com/originals/5e/11/3a/5e113a8be9457878959029e098706a81.png" alt="pressure"></th>
                    <th>Read time</th>
                    <th></th>
                </tr>  
                @foreach ($datas as $data)
                    <tr>
                        <td>{{$data->sensor->name}}</td>
                        <td>{{$data->temperature}}&deg;C</td>
                        <td>{{$data->humidity}}%</td>
                        <td>{{$data->pressure}}hPa</td>
                        <td>{{$data->created_at}}</td>
                        <td>
                            <a href="/datas/{{$data->id}}" class="btn btn-outline-info float-right"><i class="fas fa-eye mr-1"></i> View Details</a>
                        </td>
                    </tr>                        
                @endforeach 
            </table>  
        </div>
        {{ $datas->links() }}
    @else
        <h3>You have no available datas.</h3>
    @endif
@endsection
