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
                    @if(empty($squad->id))
                        <form method="POST" action="{{ route('squad.store') }}">
                            @csrf
                            <label for="name">Create a squad</label>
                            <input id="name" class="input-dark form-control" name="name" type="text">
                            <br>

                            <button class="px-4 btn background-brand text-white">Create Squad</button>
                        </form>
                    @else
                        <label for="squad_name">Squad name</label>
                        <input id="squad_name" type="text" class="input-dark form-control"
                               value=" {{ $squad->name }}"
                               disabled>
                        <br>

                        <form method="POST" action="{{ route('squad.update', $squad->id) }}">
                            @csrf
                            @method('PUT')
                            <label for="description">Description</label><br>
                            <textarea id="description"
                                      class="input-dark form-control" name="description">{{ $squad->description }}</textarea>
                            <br>

                            <button class="px-4 btn btn-success text-white">Change info</button>
                        </form>

                        <h4 class="font-weight-bold pt-5 pb-3">Disband squad</h4>
                        <p class="text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                            dignissim
                            eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur laoreet.</p>
                        <form method="POST" action="{{ route('squad.destroy', $squad->id) }}">
                            @csrf
                            @method('DELETE')
                            <input id="deleteSquad" type="checkbox" name="deleteSquad">
                            <label class="pb-2" for="deleteSquad">Yes, I want to delete my whole squad</label><br>

                            <button class="px-4 btn btn-danger text-white">Disband squad</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
@endsection
