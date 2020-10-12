@extends('layouts.app')

@section('content')

    <section class="background-secondary text-white">
        <div class="spacer pt-5 d-sm-none d-md-none">
        </div>

        @include('layouts.message')

        <div class="container pt-4">
            <div class="row">
                @include('layouts.user_menu')

                <div class="col-lg-1 pb-4">
                </div>

                <div class="col-lg-9 pb-2">
                    <h2 class="font-weight-bold pb-3">Squad settings</h2>
                    <p class="text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in dignissim
                        eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur laoreet.</p>
                    @if(empty(auth()->user()->squad_id))
                        <form method="POST" action="{{ route('squad.store') }}">
                            @csrf
                            <label for="name">Create a squad</label>
                            <input id="name" class="input-dark form-control" name="name" type="text">
                            <br>

                            <button class="px-4 btn background-brand text-white">Create Squad</button>
                        </form>
                    @else
                        {{ $user->squad->name }}
                    @endif
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
@endsection
