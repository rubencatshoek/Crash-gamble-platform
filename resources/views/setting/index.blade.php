@extends('layouts.app')

@section('content')

    <section class="background-secondary text-white">
        <div class="spacer pt-5 d-sm-none d-md-none">
        </div>

        @include('layouts.message')

        <div class="container pt-4">
            <div class="row">
                <div class="dropdown col-lg-2 pb-4">
                    <h2 class="font-weight-bold pb-2">Menu</h2>

                    <div class="pb-3">
                        <a class="text-decoration-none" href="{{ route('home') }}">
                            Admin panel
                        </a>
                    </div>

                    <div class="pb-3">
                        <a class="text-decoration-none" href="{{ route('profile', $user->name) }}">
                            View profile
                        </a>
                    </div>

                    <div class="pb-3">
                        <a class="text-decoration-none" style="color: white !important;"
                           href="{{ route('settings.index') }}">
                            Account settings
                        </a>
                    </div>

                    <div class="pb-3">
                        <a class="text-decoration-none" href="{{ route('balance.index') }}">
                            Manage balance
                        </a>
                    </div>

                    <div class="pb-3">
                        <a class="text-decoration-none" href="{{ url('/logout') }}">
                            Logout
                        </a>
                    </div>
                </div>

                <div class="col-lg-1 pb-4">
                </div>

                <div class="col-lg-9 pb-2">
                    <h2 class="font-weight-bold pb-3">Settings</h2>
                    <label for="username">Username</label>
                    <input id="username" class="input-dark form-control" type="text" value="{{ $user->name }}"
                           disabled>
                    <br>

                    @if(!empty($user->email))
                        <label for="email">Email</label>
                        <input id="email" class="input-dark form-control" type="email"
                               value=" {{ $user->email }}"
                               disabled>
                    @else
                        <form method="POST" action="{{ route('settings.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <label for="email">Email</label>
                        <input id="email" class="input-dark form-control" type="email" name="email">
                        <br>
                        <button class="btn background-brand text-white px-4">Set email</button>
                        </form>
                    @endif
                    <h4 class="font-weight-bold pt-5 pb-3">Change password</h4>

                    <form method="POST" action="{{ route('user.update') }}">
                        @csrf
                        <label for="current_password">Current password</label>
                        <input id="current_password" class="input-dark form-control" name="current_password"
                               type="password">
                        <br>

                        <label for="new_password">New password</label>
                        <input id="new_password" class="input-dark form-control" name="new_password" type="password">
                        <br>

                        <label for="confirm_new_password">Confirm new password</label>
                        <input id="confirm_new_password" class="input-dark form-control" name="confirm_new_password"
                               type="password">
                        <br>

                        <button class="btn background-brand text-white px-4">Change password</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
@endsection
