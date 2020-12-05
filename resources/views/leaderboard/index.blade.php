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
                            <h3 id="userRank" class="pr-3"><img class="img-fluid" alt="loading" height="33px" width="33px" src="{{ asset('img/load.svg') }}"></h3>
                            <span class="text-grey">Personal ranked</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 pb-3">
                    <div class="p-3 input-dark">
                        <div class="form-inline">
                            <h3 id="squadRank" class="pr-3"><img class="img-fluid" alt="loading" height="33px" width="33px" src="{{ asset('img/load.svg') }}"></h3>
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
                        @for($i = 1; $i <= 100; $i++)
                            <tr>
                                <td id="rankId{{ $i }}">#{{ $i }}</td>
                                <td id="userId{{ $i }}"><img class="img-fluid" alt="loading" height="20px" width="20px" src="{{ asset('img/load.svg') }}"></td>
                                <td id="profitId{{ $i }}" class="color-green"><img class="img-fluid" alt="loading" height="20px" width="20px" src="{{ asset('img/load.svg') }}"></td>
                            </tr>
                        @endfor
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
                        @for($j = 1; $j <= 100; $j++)
                            <tr>
                                <td id="rankId{{ $j }}">#{{ $j }}</td>
                                <td id="squadId{{ $j }}"><img class="img-fluid" alt="loading" height="20px" width="20px" src="{{ asset('img/load.svg') }}"></td>
                                <td id="squadProfitId{{ $j }}" class=""><img class="img-fluid" alt="loading" height="20px" width="20px" src="{{ asset('img/load.svg') }}"></td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
@endsection
<script src="./js/jquery.min.js"></script>
<script>
    $(function () {
        $.ajax({
            url: './leaderboards/users/hundred',
            type: "GET",
            success: function (data) {
                for($i = 1; $i <= 100; $i++) {
                    document.getElementById("userId" + $i).innerHTML = "<a href='./profile/" + data[$i].name + "'>" + data[$i].name + "</a>"
                    if(data[$i].profit < 0) {
                        document.getElementById("profitId" + $i).classList.add("color-red");
                    } else {
                        document.getElementById("profitId" + $i).classList.add("color-green");
                    }
                    document.getElementById("profitId" + $i).innerText = data[$i].profit;
                }
            }
        });
    });

    $(function () {
        $.ajax({
            url: './leaderboards/squads/hundred',
            type: "GET",
            success: function (data) {
                for($i = 1; $i <= 100; $i++) {
                    document.getElementById("squadId" + $i).innerHTML = "<a href='./squad/" + data[$i].name + "'>" + data[$i].name + "</a>"
                    if(data[$i].profit < 0) {
                        document.getElementById("squadProfitId" + $i).classList.add("color-red");
                    } else {
                        document.getElementById("squadProfitId" + $i).classList.add("color-green");
                    }
                    document.getElementById("squadProfitId" + $i).innerText = data[$i].profit;
                }
            }
        });
    });

    $(function () {
        $.ajax({
            url: './leaderboards/user/rank',
            type: "GET",
            success: function (data) {
                document.getElementById("userRank").innerText = "#" + data;
            }
        });
    });

    $(function () {
        $.ajax({
            url: './leaderboards/squad/rank',
            type: "GET",
            success: function (data) {
                document.getElementById("squadRank").innerText = "#" + data;
            }
        });
    });
</script>
