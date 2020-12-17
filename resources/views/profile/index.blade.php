@extends('layouts.app')

@section('content')

    <section class="background-secondary text-white">
        <div class="spacer pt-5 d-sm-none d-md-none">
        </div>
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-12 pb-2">
                    <a class="hover-link" href="{{ url()->previous() }}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                        </svg>
                        Go back
                    </a>
                    <h3 class="pt-2 font-weight-bold">User profile</h3>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 pb-3">
                    <div class="p-4 input-dark">
                        <h5>
                            <span id="name">{{ $user->name }}</span>
                        </h5>
                        <span class="text-grey">Joined: {{ $user->created_at }}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 pb-3 pt-3">
                    <h5>Squad stats</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 pb-3">
                    <div class="p-4 input-dark">
                        @if(!empty($squad->name))
                        <h5>
                            <a class="text-white nav-link p-0" href="{{ route('squad', $squad->name) }}">{{ $squad->name }}</a>
                        </h5>
                        <span class="text-grey">Created: {{ $squad->created_at }}</span>
                        @else
                            <span>This user does not have a squad.</span>
                        @endif
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
                            <td>{{ $user->bets }}</td>
                        </tr>
                        <tr>
                            <td class="text-grey">Total profit</td>
                            <td id="profitId"><img class="img-fluid" alt="loading" height="20px" width="20px" src="{{ asset('img/load.svg') }}"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
@endsection
<script src="../js/jquery.min.js"></script>
<script>
    $(function () {
        var user = document.getElementById('name').innerText;
        $.ajax({
            url: '../leaderboards/user/' + user,
            type: "GET",
            success: function (data) {
                    if(data < 0) {
                        document.getElementById("profitId").classList.add("color-red");
                    } else {
                        document.getElementById("profitId").classList.add("color-green");
                    }
                    document.getElementById("profitId").innerText = data;
            }
        });
    });
</script>
