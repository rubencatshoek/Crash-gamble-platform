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
                            <a href="{{ route('welcome') }}">
                                <img alt="logo image" class="pt-5 pb-5 img-fluid" height="250px" width="250px"
                                     src="{{ asset('img/logo.png') }}">
                            </a>
                        </div>

                        <div class="spacer">
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <label for="name">Username <span class="color-red">*</span></label>
                            <input placeholder="Your username" id="name" type="text"
                                   class="form-control input-dark @error('name') is-invalid @enderror" name="name"
                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <br>

                            <label for="email">Email</label>
                            <input placeholder="Your email" id="email" type="email"
                                   class="form-control input-dark @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div class="py-3">
                                <input class="@error('terms') is-invalid @enderror" type="checkbox" name="terms" required>
                            <span>I accept bla bla bla.</span>
                            </div>

                            @error('terms')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div class="row">
                                <div class="col-md-6">
                            <label for="password">Password <span class="color-red">*</span></label>
                            <input placeholder="Your password" id="password" type="password"
                                   class="form-control input-dark @error('password') is-invalid @enderror"
                                   name="password"
                                   required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                                </div>
                                <div class="col-md-6">
                            <label for="password-confirm">Confirm password <span class="color-red">*</span></label>
                            <input placeholder="Your password" id="password-confirm" type="password"
                                   class="form-control input-dark"
                                   name="password_confirmation" required autocomplete="new-password">
                            </div>
                            </div>
                            <div class="spacer">
                            </div>
                            <button type="submit" class="form-control btn background-brand text-white">
                                Register
                            </button>



                            <div class="text-center pt-5">
                                Already have an account?
                                <a class="color-brand" href="{{ route('login') }}">
                                    Login
                                </a>
                            </div>

                            <div class="spacer">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
