@extends('layouts.app')

@section('content')
    <section class="background-secondary text-white">
        <div class="spacer pt-5 d-sm-none d-md-none">
        </div>
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-12 text-center pb-4">
                    <h2 class="font-weight-bold">Leaderboards</h2>
                    <p class="lead pt-3 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci.</p>
                </div>
            </div>

            @if(!empty(auth()->user()))
            <div class="row pb-5">
                <div class="col-lg-6 pb-3">
                    <div class="p-3 input-dark">
                        <div class="form-inline">
                            <h3 class="pr-3">#{{ $rank }}</h3>
                            <span class="text-grey">Personal ranked</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 pb-3">
                    <div class="p-3 input-dark">
                        <div class="form-inline">
                            <h3 class="pr-3"># WIP</h3>
                            <span class="text-grey">Squad ranked</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col-lg-6 text-center">
                    <h3 class="font-weight-bold">Individual</h3>
                    <br>
                    <table class="table-landing table text-white background-main border-0">
                        <thead class="bg-dark">
                        <tr>
                            <th>Rank</th>
                            <th>Player</th>
                            <th>Profit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            @if(!$user->isAdmin())
                                <tr>
                                    <td>#{{ $loop->iteration }}</td>
                                    <td><a href="{{ route('profile', $user->name) }}">{{ $user->name }}</a></td>

                                    @if($user->profit >= 0)
                                        <td class="color-green">{{ $user->profit }}</td>
                                    @else
                                        <td class="color-red">{{ $user->profit * -1 }}</td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 text-center">
                    <h3 class="font-weight-bold">Squads</h3>
                    <br>
                    <table class="table-landing table text-white background-main border-0">
                        <thead class="bg-dark">
                        <tr>
                            <th>Rank</th>
                            <th>Squad</th>
                            <th>Profit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($squads as $squad)
                            <tr>
                                <td>#{{ $squad->id }}</td>
                                <td><a href="{{ route('squad', $squad->name) }}">{{ $squad->name }}</a></td>
                                <td class="color-green">WIP</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
@endsection
