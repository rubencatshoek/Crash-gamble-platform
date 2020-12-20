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
                    <h2 class="font-weight-bold pb-3">Achievements</h2>
                    <p class="text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in dignissim
                        eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur laoreet.</p><br>


                    <table class="table-landing table text-white background-main border-0">
                        <thead class="bg-dark">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($achievements as $achievement)
                            <tr>
                                <td>{{ $achievement->name }}</td>
                                <td>{{ $achievement->description }}</td>
                                <td><span class="badge badge-warning">Unavailable</span></td>
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
