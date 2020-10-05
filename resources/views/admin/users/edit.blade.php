{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Gebruikers beheren")

@section('content_header')
    <h1>Manage user: <b>{{$user->name}}</b></h1>
@stop
@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible mt-2">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{\Session::get('success')}}
        </div>
    @endif
    @if (\Session::has('errorMsg'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{\Session::get('errorMsg')}}
        </div>
    @endif
    <form action="/dashboard/admin/users/{{$user->id}}/update" method="post">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div>
                    <label for="name" class="col-form-label">Username </label>
                    <input required name="name" class="form-control @error("name") alert-danger @enderror " type="text" maxlength="15"
                           value="{{old('name') ?? $user->name}}" placeholder="Enter a username here..."
                           name="name" id="name">
                    @error("name")
                    <p class="text-danger">

                        This username is already taken.
                    </p>
                    @enderror
                </div>
                <div>
                    <label for="role_id" class="col-form-label">Role </label>
                    <select required name="role_id" class="form-control @error("role_id") alert-danger @enderror"
                            name="role_id" id="role_id">
                        @if ($user->role_id == 1) <option name="role_id" value="1"> User</option> <option name="role_id" value="3"> Moderator</option>@endif
                        @if ($user->role_id == 3) <option name="role_id" value="3"> Moderator</option> <option name="role_id" value="1"> User</option>@endif
                    </select>
                    @error("role_id")
                    <p class="text-danger">

                        Please select one of the options from the dropdown menu.
                    </p>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-4">Edit user</button>
        <a class="btn btn-danger mt-4" href="/dashboard/admin/users">Cancel</a>
    </form>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/main.css">
@endsection


@section('js')

@endsection
