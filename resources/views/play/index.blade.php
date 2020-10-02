@extends('layouts.app')

@section('content')
    <style>
        html, body {margin: 0;}
    </style>

    <nav class="shadow-sm navbar navbar-expand-lg background-main navbar-dark py-3" id="mainNav" style="z-index: -999;">
        <div class="container pb-1">
                <img alt="logo" class="img-fluid" height="200px" width="200px" src="{{ asset('img/logo.png') }}">
        </div>
    </nav>

    <div class="container-fluid height-100">
        <div class="row height-100">
            <div class="col-md-10 border">
                <h1 class="text-white">Game</h1>
            </div>
            <div class="col-md-2 border">
                <h1 class="text-white">Chat</h1>
            </div>
        </div>
    </div>
@endsection
