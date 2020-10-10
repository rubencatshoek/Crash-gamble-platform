<div class="dropdown col-lg-2 pb-4">
    <h2 class="font-weight-bold pb-2">Menu</h2>

    @if($user->isAdmin())
    <div class="pb-3">
        <a class="text-decoration-none" href="{{ route('home') }}">
            Admin panel
        </a>
    </div>
    @endif

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
