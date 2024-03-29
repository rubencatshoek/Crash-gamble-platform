@extends('layouts.app')

@section('content')

    <section class="background-secondary text-white">
        <div class="spacer pt-5 d-sm-none d-md-none">
        </div>

        @include('layouts.message')

        <div class="container pt-4">
            <div class="row">
                @include('layouts.user_menu')

                <div class="col-lg-1 pb-4">
                </div>

                <div class="col-lg-9 pb-2">
                    <h2 class="font-weight-bold pb-3">Squad settings | Manage users</h2>
                    <p class="text-grey pb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim
                        eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur laoreet.</p>

                    <table class="table-landing table text-white background-main border-0">
                        <thead class="bg-dark">
                        <tr>
                            <th>User</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($squadMembers as $squadMember)
                            <form method="POST" action="{{ route('squad.update.role') }}">
                                @csrf
                                <tr>
                                    @if($squadMember->user->id !== $user->id)

                                        <td>
                                            <a href="{{ route('profile', $squadMember->user->name) }}">{{ $squadMember->user->name }}</a>
                                            <input type="hidden" value="{{ $squadMember->user->id }}"
                                                   name="squadMemberId">
                                        </td>

                                        <td>
                                            <select class="form-control" name="squadRole">
                                                @foreach($squadRoles as $role)
                                                    @if($role->id !== 1)
                                                        <option @if($squadMember->squadRole->id === $role->id) selected
                                                                @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <button type="submit" class="btn btn-light">Update</button>
                                            <a href="{{ route('squad.kick', $squadMember->user->id) }}"
                                               class="btn btn-danger">Kick</a>
                                        </td>
                                    @endif
                                </tr>
                            </form>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
@endsection
