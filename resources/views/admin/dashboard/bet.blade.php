@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        User bets

                        <h1 class="font-weight-bold">Game ID {{ $bet->id }}</h1>
                        <a class="text-sm light-grey" href="{{ url()->previous() }}">Go back</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        House win/loss on bet:

                        <h1 class="font-weight-bold">{{$profit}}</h1>
                        <a class="text-sm light-grey" href="#">N/A</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card background-main">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table background-main">
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
        </div>
    </div>
@stop

@section('css')
    <link href="{{ asset('css/admin_custom.css') }}" rel="stylesheet">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
