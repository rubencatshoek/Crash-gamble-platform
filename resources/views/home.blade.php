@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <p>how to style <a href="https://github.com/jeroennoten/Laravel-AdminLTE/wiki/4.-Usage" target="_blank">here</a></p>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                yeet
            </div>
            <div class="col-6">
                yeet
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
