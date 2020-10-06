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
                        <a class="text-decoration-none" href="{{ route('settings.index') }}">
                            Account settings
                        </a>
                    </div>

                    <div class="pb-3">
                        <a class="text-decoration-none" style="color: white !important;"
                           href="{{ route('balance.index') }}">
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
                    <h2 class="font-weight-bold pb-3">Manage balance</h2>
                    <label for="paid_balance">Paid balance</label>
                    <input id="paid_balance" class="input-dark form-control" type="text"
                           value="{{ $user->paid_balance }}"
                           disabled>
                    <br>
                    <label for="free_balance">Free balance</label>
                    <input id="free_balance" class="input-dark form-control" type="text"
                           value="{{ $user->free_balance }}"
                           disabled>
                    <br>

                    <a href="#" class="btn btn-success text-white px-4">Deposit</a>
                    <a href="#" class="btn btn-dark text-white px-4">Withdraw</a>

                    <h4 class="font-weight-bold pt-5 pb-3">Donate to another user</h4>
                    <p class="text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in dignissim
                        eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur laoreet.</p>

                    <form method="POST" action="{{ route('balance.donate') }}">
                        @csrf
                        <label for="name">Username</label>
                        <input id="name" class="input-dark form-control" name="name"
                               type="text" placeholder="name">
                        <br>

                        <label for="amount">Amount</label>
                        <input id="amount" class="input-dark form-control" name="amount"
                               type="number" placeholder="1000">
                        <br>

                        <button type="submit" class="btn background-brand text-white px-4">Donate</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')
@endsection
