@extends('layouts.app')

@section('content')
    <div class="background-main text-white">
        <div class="spacer">
        </div>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6 pr-5">
                    <h1 class="landing-page-header">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</h1>
                    <p class="lead pt-3 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet.</p>
                    <div class="pt-3">
                        <a class="btn background-brand btn-lg w-100">Play now</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 pb-5">

                            <img alt="crash gif" class="img-fluid" src="{{ asset('img/crash.gif') }}">

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
                    <h1 class="font-weight-bold">1000K</h1>
                    <p class="text-uppercase">Wagered</p>
                </div>
                <div class="col-lg-3 text-center">
                    <h1 class="font-weight-bold">100K</h1>
                    <p class="text-uppercase">Bankroll</p>
                </div>
                <div class="col-lg-3 text-center">
                    <h1 class="font-weight-bold">25K</h1>
                    <p class="text-uppercase">Highest bet</p>
                </div>
                <div class="col-lg-3 text-center">
                    <h1 class="font-weight-bold">15K</h1>
                    <p class="text-uppercase">Players</p>
                </div>
            </div>

        </div>
    </section>
@endsection
