@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <table>
                            <tr>
                                <td>
                                    House win/loss on bet:
                                </td>
                                <td>
                                    {{$profit}}
                                </td>
                            </tr>
                            <th>
                                User
                            </th>
                            <th>
                                Amount bet
                            </th>
                            @foreach($otherBets as $otherBet)
                                <tr>
                                    <td>
                                        {{$otherBet->users->name}}
                                    </td>
                                    <td>
                                        {{$otherBet->amount_bet}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

        </div>
    </div>
@stop

@section('css')
    <link href="{{ asset('css/admin_custom.css') }}" rel="stylesheet">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
