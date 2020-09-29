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

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <label for="email">Email</label>

                            <input id="email" type="email" placeholder="Your email"
                                   class="form-control input-dark @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div class="spacer">
                            </div>
                            <button type="submit" class="form-control btn background-brand text-white">
                                Send reset link
                            </button>

                            <div class="text-center pt-5">
                                Remember your password?
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
