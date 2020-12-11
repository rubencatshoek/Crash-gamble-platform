@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$userCount}}</h3>

                        <p>Total sign-ups</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$highestBetWithBetId->amount_bet}}</h3>
                        <a href="bet/{{$highestBetWithBetId->id}}"><p>Highest bet</p></a>

                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        @if($highestBetToday !== null)
                            <h3>{{$highestBetToday}}</h3>
                        @else
                            <h3>-</h3>
                        @endif
                        <p>Highest bet today</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$totalProfit}}</h3>
                        <p>Total profit</p>
                    </div>
                </div>
            </div>
        </div>

        @foreach($latestGames as $game)
            {{ $game->crashed_at }}<br>
            {{ $game->bets }}<br>
        @endforeach
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
