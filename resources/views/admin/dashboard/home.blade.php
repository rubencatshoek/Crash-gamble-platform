@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-2 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        Total sign-ups

                        <h1 class="font-weight-bold">{{$userCount}}</h1>
                        <a class="text-sm light-grey" href="{{ route('admin.user.index') }}">View users</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        Highest bet all time

                        <h1 class="font-weight-bold">{{round($highestBetWithBetId->amount_bet)}}</h1>
                        <a class="text-sm light-grey" href="{{ route('bet.user.id', $highestBetWithBetId->id) }}">View
                            highest bet all time</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        Highest bet today

                        @if($highestBetToday !== null)
                            <h1 class="font-weight-bold">{{$highestBetToday}}</h1>
                        @else
                            <h1 class="font-weight-bold">N/A</h1>
                        @endif
                        <a class="text-sm light-grey" href="#">N/A</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        Total casino profit

                        <h1 class="font-weight-bold">{{$totalProfit}}</h1>
                        <a class="text-sm light-grey" href="#">N/A</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        Total wagered

                        <h1 class="font-weight-bold">{{$totalWagered}}</h1>
                        <a class="text-sm light-grey" href="#">N/A</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        Total bets

                        <h1 class="font-weight-bold">{{ $totalBets }}</h1>
                        <a class="text-sm light-grey" href="#">N/A</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        Highest crash all time

                        <h1 class="font-weight-bold">{{$highestCrash}}</h1>
                        <a class="text-sm light-grey" href="#">N/A</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        Highest crash today

                        @if($highestCrashToday !== null)
                            <h1 class="font-weight-bold">{{$highestCrashToday}}</h1>
                        @else
                            <h1 class="font-weight-bold">N/A</h1>
                        @endif
                        <a class="text-sm light-grey" href="#">N/A</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        Total crash games

                        <h1 class="font-weight-bold">{{ $totalCrashes }}</h1>
                        <a class="text-sm light-grey" href="#">N/A</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        Coming soon

                        <h1 class="font-weight-bold">N/A</h1>
                        <a class="text-sm light-grey" href="#">N/A</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        Coming soon

                        <h1 class="font-weight-bold">N/A</h1>
                        <a class="text-sm light-grey" href="#">N/A</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-6">
                <div class="card background-main">
                    <div class="card-body">
                        Coming soon

                        <h1 class="font-weight-bold">N/A</h1>
                        <a class="text-sm light-grey" href="#">N/A</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12 col-md-12 table-responsive">
                <table class="table background-main">
                    <thead>
                    <tr>
                        <th scope="col">Game ID</th>
                        <th scope="col">Crashed at</th>
                        <th scope="col">User id</th>
                        <th scope="col">User crashed at</th>
                        <th scope="col">Amount bet</th>
                        <th scope="col">Creation date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($latestGames as $game)
                        <tr>
                            <td>{{ $game->id }}</td>
                            <td>{{ $game->crashed_at }}</td>
                            <td>
                                @foreach($game->bets as $bet)
                                    <a class="light-grey"
                                       href="{{ route('admin.user.edit', $bet->user_id) }}">{{ $bet->user_id }}</a>
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($game->bets as $bet)
                                    <span>{{ $bet->user_crashed_at}}</span>
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($game->bets as $bet)
                                    @if($game->crashed_at < $bet->user_crashed_at  || $bet->user_crashed_at === null)
                                        <span class="text-green">{{ $bet->amount_bet}}</span>
                                    @else
                                        <span class="text-red">{{ $bet->amount_bet}}</span>
                                    @endif
                                    <br>
                                @endforeach
                            </td>
                            <td>{{ $game->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="{{ asset('css/admin_custom.css') }}" rel="stylesheet">
@stop

@section('js')

@stop
