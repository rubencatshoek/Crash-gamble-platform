@extends('layouts.app')

@section('content')

    <section class="background-secondary text-white">
        <div class="spacer pt-5 d-sm-none d-md-none">
        </div>
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-12 text-center pb-4">
                    <h2 class="font-weight-bold">User profile</h2>
                    <p class="lead pt-3 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet.</p>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-5 pb-4">
                    <h4 class="font-weight-bold pb-3">User</h4>

                    <div class="p-4 input-dark">
                        <h5>
                            {{ $user->name }}
                        </h5>
                        <span class="text-grey">Joined: {{ $user->created_at }}</span>
                    </div>
                </div>

                <div class="col-lg-2 pb-2"></div>

                <div class="col-lg-5 pb-4">
                    <h4 class="font-weight-bold pb-3">Squad</h4>

                    <div class="p-4 input-dark">
                        <h5>
                            Squad name here
                        </h5>
                        <span class="text-grey">Created: {{ $user->created_at }}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 pb-4">
                    <h4 class="font-weight-bold pb-3">Betting statistics</h4>
                    <div class="p-4 input-dark">
                        <p>Stat: bla bla</p>
                    </div>
                </div>

                <div class="col-lg-2 pb-2"></div>

                <div class="col-lg-5 pb-4">
                    <h4 class="font-weight-bold pb-3">Squad statistics</h4>
                    <div class="p-4 input-dark">
                        <p>Stat: bla bla</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')
@endsection
