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
        @foreach ($users as $user)
            <div class="col-12 col-md-3">
                <div class="card" style="width: 18rem;">
                    {{--                    <img class="card-img-top" src="..." alt="C">--}}
                    <div class="card-body">
                        <h2 class="card-title font-weight-bold">{{$user->name}}</h2> <br>
                        <p class="card-text">
                            {{$user->email}} <br>
                            {{$user->phone_number}}
                        </p>

                        <a href="/dashboard/gebruikers/{{$user->id}}" class="btn btn-primary">Manage</a>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('js')

@endsection
