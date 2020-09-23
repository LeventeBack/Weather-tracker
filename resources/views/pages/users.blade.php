@extends('layouts.app')

@section('content')
    @if(count($users) > 0)
        <h2>Users list</h2>
        
        <div class="table-responsive">
            <table class="table mt-4">   
                <tr class="table-info">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joined at</th>
                    <th>Owned sensors</th>
                </tr>  
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            {{count($user->sensors)}}
                            <a href="/users/{{$user->id}}" class="btn btn-outline-info float-right">View</a>
                        </td>
                    </tr>                        
                @endforeach 
            </table>
        </div>  
    @else
        <h3>You have no available sensors</h3>
    @endif
@endsection