@extends('layouts.base')

@section('title', 'Users List')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Users</h2>
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width=20%>User id</th>
                                <th width=80%>Name</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <a href="{{ action('MessageController@displayChat', ['id' => $user->id]) }}" role="button" class="btn btn-primary" >Chat</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection