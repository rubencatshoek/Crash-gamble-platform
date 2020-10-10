@extends('layouts.app')

@section('content')

    <section class="background-secondary text-white">
        <div class="spacer pt-5 d-sm-none d-md-none">
        </div>
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-12 pb-2">
                    <h2 class="font-weight-bold text-center">Squad profile</h2>
                    <h5>Squad stats</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 pb-3">
                    <div class="p-4 input-dark">
                        <h5>
                            Squad: {{ $squad->name }}
                        </h5>
                        <span class="text-grey">Created: {{ $squad->created_at }}</span>
                        <br><br>
                        <span class="text-grey">Description:</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur laoreet.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 pb-3 pt-3">
                    <h5>Betting stats</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 pb-3">
                    <table class="table-landing table text-white background-main border-0">
                        <thead class="bg-dark">
                        <tr>
                            <th class="w-50">Type</th>
                            <th class="w-50">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-grey">Total bets</td>
                                <td>100.000</td>
                            </tr>
                            <tr>
                                <td class="text-grey">Total profit</td>
                                <td class="color-green">₿50</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 pb-3 pt-3">
                    <h5>User stats</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 pb-3">
                    <table class="table-landing table text-white background-main border-0">
                        <thead class="bg-dark">
                        <tr>
                            <th class="w-50">User</th>
                            <th class="w-50">Profit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($squad->users as $users)
                            <tr>
                                <td><a href="{{ route('profile', $users->name) }}">{{ $users->name }}</a></td>
                                <td class="color-green">₿50</td>
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
