@extends('layouts.app')

@section('content')
    <div class="background-main text-white">
        <div class="spacer">
        </div>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="spacer d-block d-sm-none">
                    </div>
                    <h1 class="landing-page-header text-responsive">Digital Phase: <br>The New Name in Cryptocurrency Gambling</h1>
                    <p class="lead pt-3 text-grey">Digital Phase’s gambling provides users with a verifiably safe,
                        anonymous, and exciting experience in the world of online cryptocurrency gambling.</p>
                    <div class="pt-3">
                        <a class="btn background-brand btn-lg w-100 text-white" href="{{ route('play.index') }}">Play
                            now</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 pb-5">
                            <img alt="crash gif" class="img-fluid d-none d-sm-none d-md-block" src="{{ asset('img/crash.gif') }}">
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="pb-3">
                                <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-shield-shaded"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                                    <path
                                        d="M8 2.25c.909 0 3.188.685 4.254 1.022a.94.94 0 0 1 .656.773c.814 6.424-4.13 9.452-4.91 9.452V2.25z"/>
                                </svg>
                            </div>
                            <p class="">Advanced provably fairness</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="pb-3">
                                <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-suit-spade-fill"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.602 14.153C6.272 13.136 7.348 11.28 8 9c.652 2.28 1.727 4.136 2.398 5.153.231.35-.02.847-.438.847H6.04c-.419 0-.67-.497-.438-.847z"/>
                                    <path
                                        d="M4.5 12.5A3.5 3.5 0 0 0 8 9a3.5 3.5 0 1 0 7 0c0-3-4-4-7-9-3 5-7 6-7 9a3.5 3.5 0 0 0 3.5 3.5z"/>
                                </svg>
                            </div>
                            <p class="">Play crash gamemode</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="pb-3">
                                <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-patch-check-fll"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984a.5.5 0 0 0-.708-.708L7 8.793 5.854 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                </svg>
                            </div>
                            <p class="">Approved by Cryptogambling.org</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer">
        </div>
    </div>

    <section class="background-secondary text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center pb-4">
                    <h2 class="font-weight-bold">Statistics</h2>
                    <p class="lead pt-3 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 text-center">
                    <h1 class="font-weight-bold">{{ $totalWagered }}</h1>
                    <p class="text-uppercase">Total wagered</p>
                </div>
                <div class="col-lg-3 text-center">
                    <h1 class="font-weight-bold">{{ $highestBetToday }}</h1>
                    <p class="text-uppercase">Highest bet today</p>
                </div>
                <div class="col-lg-3 text-center">
                    <h1 class="font-weight-bold">{{ $highestBet }}</h1>
                    <p class="text-uppercase">Highest bet</p>
                </div>
                <div class="col-lg-3 text-center">
                    <h1 class="font-weight-bold">{{ $totalPlayers }}</h1>
                    <p class="text-uppercase">Total players</p>
                </div>
            </div>

        </div>
    </section>

    <section class="background-main text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center pb-4">
                    <h2 class="font-weight-bold">Featured in</h2>
                    <p class="lead pt-3 text-grey">Do not just take our word for it, we have been featured in dozens of
                        newspapers all over the world that have praised our casino, our provably fair rolls, and our
                        award-winning customer service.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 text-center px-4">
                    <img class="img-fluid" height="250px" width="250px" src="{{ asset('img/logo.png') }}">
                    <p class="pt-3 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci.
                    </p>
                </div>

                <div class="col-lg-4 text-center px-4">
                    <img class="img-fluid" height="250px" width="250px" src="{{ asset('img/logo.png') }}">
                    <p class="pt-3 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci.
                    </p>
                </div>
                <div class="col-lg-4 text-center px-4">
                    <img class="img-fluid" height="250px" width="250px" src="{{ asset('img/logo.png') }}">
                    <p class="pt-3 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="background-secondary text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center pb-4">
                    <h2 class="font-weight-bold">Provably fair</h2>
                    <p class="lead pt-3 text-grey">At Digital Phase, we want our customers to have the best possible
                        experience! That is why we have taken every step possible to ensure that our casino meets the
                        most rigorous standards and can stand up to the highest amount of scrutiny.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="pb-3">
                        <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-gem" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M3.1.7a.5.5 0 0 1 .4-.2h9a.5.5 0 0 1 .4.2l2.976 3.974c.149.185.156.45.01.644L8.4 15.3a.5.5 0 0 1-.8 0L.1 5.3a.5.5 0 0 1 0-.6l3-4zm11.386 3.785l-1.806-2.41-.776 2.413 2.582-.003zm-3.633.004l.961-2.989H4.186l.963 2.995 5.704-.006zM5.47 5.495l5.062-.005L8 13.366 5.47 5.495zm-1.371-.999l-.78-2.422-1.818 2.425 2.598-.003zM1.499 5.5l2.92-.003 2.193 6.82L1.5 5.5zm7.889 6.817l2.194-6.828 2.929-.003-5.123 6.831z"/>
                        </svg>
                    </div>
                    <h5 class="font-weight-bold">0.5% house edge</h5>
                    <p class="text-grey">Digital Phase is proud to announce that we have the lowest house edge currency
                        found in cryptocurrency gambling (lower than most in person casinos too)! This translates to
                        more big wins for our players.</p>
                </div>

                <div class="col-md-3 text-center">
                    <div class="pb-3">
                        <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-shield-shaded"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                            <path
                                d="M8 2.25c.909 0 3.188.685 4.254 1.022a.94.94 0 0 1 .656.773c.814 6.424-4.13 9.452-4.91 9.452V2.25z"/>
                        </svg>
                    </div>
                    <h5 class="font-weight-bold">Provably fairness</h5>
                    <p class="text-grey">Our rolls are backed by independently verified math, and we can prove it too!
                        We use XXXXX to guarantee that every roll is fair and accurate, giving our players the best odds
                        possible!</p>
                </div>

                <div class="col-md-3 text-center">
                    <div class="pb-3">
                        <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-patch-check-fll"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984a.5.5 0 0 0-.708-.708L7 8.793 5.854 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                        </svg>
                    </div>
                    <h5 class="font-weight-bold">Cryptogambling approved</h5>
                    <p class="text-grey">Due to our rigorous fairness and customer service standards, Digital Phase has
                        been awarded the seal of approval from the largest cryptocurrency regulator agency:
                        Cryptogambling.org! </p>
                </div>

                <div class="col-md-3 text-center">
                    <div class="pb-3">
                        <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-dice-6-fill" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3zm1 5.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm8 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm1.5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM12 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM5.5 12a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM4 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                        </svg>
                    </div>
                    <h5 class="font-weight-bold">Random.org API</h5>
                    <p class="text-grey">Another measure that we have implemented to help guarantee provably fair rolls
                        that no user (including Digital Phase) is able to predict the next roll, we have partnered with
                        Random.org API in order to guarantee even further provable randomization.</p>
                </div>
            </div>

        </div>
    </section>

    <section class="background-main text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center pb-4">
                    <h2 class="font-weight-bold">Game aspects</h2>
                    <p class="lead pt-3 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 text-center">
                    <img alt="crash gif" class="img-fluid" src="{{ asset('img/crash.gif') }}">
                </div>

                <div class="col-lg-6 text-center">
                    <h5 class="font-weight-bold">Title</h5>
                    <p class="text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet.
                    </p>

                    <h5 class="font-weight-bold">Title</h5>
                    <p class="text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <section class="background-secondary text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center pb-4">
                    <h2 class="font-weight-bold">Social aspects</h2>
                    <p class="lead pt-3 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 text-center">
                    <h5 class="font-weight-bold">Title</h5>
                    <p class="text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet.
                    </p>

                    <h5 class="font-weight-bold">Title</h5>
                    <p class="text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet.
                    </p>
                </div>

                <div class="col-lg-6 text-center">
                    <img alt="crash gif" class="img-fluid" src="{{ asset('img/crash.gif') }}">
                </div>
            </div>

        </div>
    </section>

    <section class="background-main text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center pb-4">
                    <h2 class="font-weight-bold">Leaderboards</h2>
                    <p class="lead pt-3 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 text-center">
                    <h3 class="font-weight-bold">Individual</h3>
                    <p class="lead text-grey">The top 5 players</p>
                    <table class="table-landing table text-white background-secondary border-0">
                        <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Player</th>
                            <th>Profit</th>
                        </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i <= 5; $i++)
                            <tr>
                                <td id="rankId{{ $i }}">#{{ $i }}</td>
                                <td id="userId{{ $i }}">Loading name</td>
                                <td id="profitId{{ $i }}" class="color-green">Loading profit</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 text-center">
                    <h3 class="font-weight-bold">Squads</h3>
                    <p class="lead text-grey">The top 5 squads</p>
                    <table class="table-landing table text-white background-secondary border-0">
                        <thead>
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

    <section class="background-secondary text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center pb-4">
                    <h2 class="font-weight-bold">Sign up bonus</h2>
                    <p class="lead pt-3 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 text-center">

                </div>
                <div class="col-lg-6 text-center">
                    <a class="btn background-brand btn-lg w-100 text-white" href="{{ route('play.index') }}">Play
                        now</a>
                </div>
                <div class="col-lg-3 text-center">

                </div>
            </div>

        </div>
    </section>
    @include('layouts.footer')
@endsection
{{-- TODO: non-online jQuery call --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        $.ajax({
            url: './leaderboards/users/5',
            type: "GET",
            success: function (data) {
                for($i = 1; $i <= 5; $i++) {
                    document.getElementById("userId" + $i).innerHTML = "<a href='./profile/" + data[$i].name + "'>" + data[$i].name + "</a>"
                    document.getElementById("profitId" + $i).innerText = data[$i].profit;
                }
            }
        });
    });
</script>
