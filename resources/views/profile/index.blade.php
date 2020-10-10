@extends('layouts.app')

@section('content')

    <section class="background-secondary text-white">
        <div class="spacer pt-5 d-sm-none d-md-none">
        </div>
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-12 pb-2">
                    <h2 class="font-weight-bold text-center">User profile</h2>
                    <h5>User stats</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 pb-3">
                    <div class="p-4 input-dark">
                        <h5>
                            {{ $user->name }}
                        </h5>
                        <span class="text-grey">Joined: {{ $user->created_at }}</span>
                    </div>
                </div>

                <div class="col-lg-6 pb-3">
                    <div class="p-4 input-dark">
                        <h5>
                            <a class="text-white nav-link p-0" href="{{ route('squad', $user->squad->name) }}">{{ $user->squad->name }}</a>
                        </h5>
                        <span class="text-grey">Created: {{ $user->squad->created_at }}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 pb-3 pt-3">
                    <h5>Betting stats</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 pb-3">
                    <div class="p-4 input-dark">
                        <p>Stat: bla bla</p>
                    </div>
                </div>

                <div class="col-lg-6 pb-3">
                    <div class="p-4 input-dark">
                        <p>Stat: bla bla</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 pb-3 pt-3">
                    <h5>Squad stats</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 pb-3">
                    <div class="p-4 input-dark">
                        <p>Stat: bla bla</p>
                    </div>
                </div>

                <div class="col-lg-6 pb-3">
                    <div class="p-4 input-dark">
                        <p>Stat: bla bla</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
@endsection
