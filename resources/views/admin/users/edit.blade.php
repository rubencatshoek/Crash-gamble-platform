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
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
    @endif
    <form action="/dashboard/admin/users/{{$user->id}}/update" method="post">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div>
                    <label for="name" class="col-form-label">Username </label>
                    <input required name="name" class="form-control" type="text" maxlength="255"
                           value="{{old('name') ?? $user->name}}" placeholder="Geef hier een naam aan je thema."
                           name="name" id="name">
                    @error("name")
                    <p class="text-danger">

                        * Je hebt een unieke naam nodig of minder karakters, maximum 255.
                    </p>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-4">Edit user</button>
    </form>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/main.css">
@endsection


@section('js')

@endsection
