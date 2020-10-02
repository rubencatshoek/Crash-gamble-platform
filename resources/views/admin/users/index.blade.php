{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Gebruikers beheren")

@section('content_header')
    <h1>Manage users</h1>
@stop

@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible mt-2">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{\Session::get('success')}}
        </div>
    @endif

    <a href="gebruikers/aanmaken" class="btn red-button my-3">Add user</a>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                    </tr>
                    </thead>
                    @foreach ($users as $user)
                        @if($user->role_id === 2)
                    <tbody>
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>Admin </td>
                        <td><a href="/admin/users/{{$user->id}}/edit" class="btn btn-primary">Manage</a></td>
                    </tr>
                        @endif
                    @endforeach
                    @foreach ($users as $user)
                        @if($user->role_id === 1)
                            <tbody>
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td> User </td>
                                <td><a href="/dashboard/gebruikers/{{$user->id}}" class="btn btn-primary">Manage</a></td>
                            </tr>
                            @endif
                            @endforeach
                    </tbody>
                </table>
            </div>


    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('js')

@endsection
