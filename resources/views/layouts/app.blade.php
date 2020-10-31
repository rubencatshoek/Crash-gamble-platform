<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Crash Gamble</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scrolling-nav.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/scrolling-nav.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Muli" rel="stylesheet">
</head>
<body>
<nav class="shadow-sm navbar navbar-expand-lg background-main fixed-top navbar-dark py-3" id="mainNav">
    <div class="container">
        <a href="{{ route('welcome') }}">
            <img alt="logo" class="img-fluid" height="200px" width="200px" src="{{ asset('img/logo.png') }}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('play.index') }}"
                       style="@if(Request::is('play')) color:white !important; @endif">Play</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leaderboards.index') }}"
                       style="@if(Request::is('leaderboards')) color:white !important; @endif">Leaderboards</a>
                </li>
                <li class="nav-item pr-2">
                    <a class="nav-link" href="{{ route('user.faq.index') }}"
                       style="@if(Request::is('faq')) color:white !important; @endif">FAQ</a>
                </li>

                @if (Auth::guest())
                    <li class="nav-item pr-2">
                        <a class="btn btn-outline-light px-4" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    <div class="pt-2 d-lg-none">
                    </div>

                    <li class="nav-item">
                        <a class="btn background-brand text-white px-4" href="{{ route('register') }}">
                            Sign up
                        </a>
                    </li>
                @endif

                @if ($user = Auth::user())
                    @if(!$user->isAdmin())
                        <div class="dropdown dropdown-balance show">

                            <a class="nav-link dropdown-toggle" href="#" role="button"
                               id="dropdownBalanceMenuLink" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">

                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-wallet-fill"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                    <path
                                        d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6z"/>
                                </svg>&nbsp;
                                {{ $user->paid_balance + $user->free_balance }}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownBalanceMenuLink">
                                <a href="#" class="dropdown-item py-2">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <span class="">
                                   {{ $user->paid_balance }} paid balance
                               </span>
                                </a>

                                <a href="#" class="dropdown-item py-2">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-half"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 0 1-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.171-.403.59.59 0 0 1 .084-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 0 1 .163-.505l2.906-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.002 2.223 8 2.226v9.8z"/>
                                    </svg>
                                    <span class="">
                                   {{ $user->free_balance }} free balance
                               </span>
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="dropdown show">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $user->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            @if($user->isAdmin())
                                <a class="dropdown-item py-2" href="{{ route('home') }}">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-lines-fill"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                    Admin panel
                                </a>
                            @endif

                            <a class="dropdown-item py-2" href="{{ route('profile', $user->name) }}">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                                View profile
                            </a>

                            @if(!$user->isAdmin())
                                <a class="dropdown-item py-2" href="{{ route('squad.index') }}">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                    </svg>
                                    Squad settings
                                </a>

                                @if($user->isLeader())
                                    <a class="dropdown-item py-2" href="{{ route('squad.manage') }}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                        Manage squad
                                    </a>
                                @endif
                            @endif

                            <a class="dropdown-item py-2" href="{{ route('settings.index') }}">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear-fill"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z"/>
                                </svg>
                                Account settings
                            </a>

                            @if(!$user->isAdmin())
                                <a class="dropdown-item py-2" href="{{ route('balance.index') }}">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-wallet-fill"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                        <path
                                            d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6z"/>
                                    </svg>
                                    Manage balance
                                </a>
                            @endif


                            <a class="dropdown-item" href="{{ url('/logout') }}">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                                Logout
                            </a>
                        </div>
                    </div>
                @endif
            </ul>
        </div>
    </div>
</nav>
<main>
    @yield('content')
</main>
</body>
</html>
