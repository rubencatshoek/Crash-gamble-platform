@extends('layouts.app')

@section('content')
    <div class="spacer">
    </div>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-white background-secondary rounded">
                    <div class="card-body pl-5 pr-5">

                        <div class="text-center">
                            <a href="./">
                            <img alt="logo image" class="pt-5 pb-5 img-fluid" height="250px" width="250px"
                                 src="{{ asset('img/logo.png') }}">
                            </a>
                        </div>

                        <div class="spacer">
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

{{--                            TODO: Change email to username --}}
                            <label for="email">Email</label>
                            <input placeholder="Your email" id="email" type="email"
                                   class="form-control input-dark @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <br>
                            <label for="password">Password</label>
                            <input placeholder="Your password" id="password" type="password"
                                   class="form-control input-dark @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror


                            <div class="spacer">
                            </div>
                            <button type="submit" class="form-control btn btn-dark">
                                Login
                            </button>

                            <div class="spacer">
                            </div>
                            <div class="text-center pt-5">
                                Don't have an account?
                                <a class="" href="{{ route('password.request') }}">
                                    Sign up
                                </a>

                                <div class="pt-2">
                                    @if (Route::has('password.request'))
                                        <a class="" href="{{ route('password.request') }}">
                                            Forgot your password?
                                        </a>
                                    @endif
                                </div>

                                <div class="spacer">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
