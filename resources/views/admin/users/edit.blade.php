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
    <form action="{{route ('admin.user.update', $user->id)}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div>
                    <label for="name" class="col-form-label">Username </label>
                    <input required class="form-control @error("name") alert-danger @enderror " type="text" maxlength="15"
                           value="{{old('name') ?? $user->name}}"
                           name="name" id="name">
                    @error("name")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="email" class="col-form-label">Email </label>
                    <input class="form-control @error("email") alert-danger @enderror " type="email" maxlength="40"
                           value="{{old('email') ?? $user->email}}"
                           name="email" id="email">
                    @error("email")
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="paid_balance" class="col-form-label">Paid balance </label>
                    <input required class="form-control @error("paid_balance") alert-danger @enderror " type="number"
                           value="{{old('paid_balance') ?? $user->paid_balance}}"
                           name="paid_balance" id="paid_balance">
                    @error("paid_balance")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="free_balance" class="col-form-label">Free balance </label>
                    <input required class="form-control @error("free_balance") alert-danger @enderror " type="number"
                           value="{{old('free_balance') ?? $user->free_balance}}"
                           name="free_balance" id="free_balance">
                    @error("free_balance")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="role_id" class="col-form-label">Role </label>
                    <select required name="role_id" class="form-control @error("role_id") alert-danger @enderror"
                            name="role_id" id="role_id">
                        @if ($user->isUser()) <option name="role_id" value="1"> User</option> <option name="role_id" value="2"> Moderator</option>@endif
                        @if ($user->isMod()) <option name="role_id" value="2"> Moderator</option> <option name="role_id" value="1"> User</option>@endif
                    </select>
                    @error("role_id")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-4">Edit user</button>
        <a class="btn btn-danger mt-4" href="{{route ('admin.user.index')}}">Cancel</a>
    </form>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/main.css">
@endsection


@section('js')

@endsection
