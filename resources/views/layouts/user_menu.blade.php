<div class="dropdown col-lg-2 pb-4">
    <h2 class="font-weight-bold pb-2">Menu</h2>

    @if($user->isAdmin())
        <div class="pb-3">
            <a class="text-decoration-none" href="{{ route('home') }}">
                Admin panel
            </a>
        </div>
    @endif

    @if(!$user->isAdmin())
    <div class="pb-3">
        <a class="text-decoration-none" href="{{ route('profile', $user->name) }}">
            View profile
        </a>
    </div>
    @endif

    @if(!$user->isAdmin())
        <div class="pb-3">
            <a class="text-decoration-none" href="{{ route('squad.index') }}"
               style="@if(Request::is('squad')) color:white !important; @endif">
                Squad settings
            </a>
        </div>

        @if($user->isLeader())
            <div class="pb-3">
                <a class="text-decoration-none" href="{{ route('squad.manage') }}"
                   style="@if(Request::is('manage/squad')) color:white !important; @endif">
                    Manage squad
                </a>
            </div>
        @endif
    @endif

    <div class="pb-3">
        <a class="text-decoration-none" href="{{ route('settings.index') }}"
           style="@if(Request::is('settings')) color:white !important; @endif">
            Account settings
        </a>
    </div>

    @if(!$user->isAdmin())
        <div class="pb-3">
            <a class="text-decoration-none" href="{{ route('balance.index') }}"
               style="@if(Request::is('balance')) color:white !important; @endif">
                Manage balance
            </a>
        </div>
    @endif

    <div class="pb-3">
        <a class="text-decoration-none" href="{{ url('/logout') }}">
            Logout
        </a>
    </div>
</div>
