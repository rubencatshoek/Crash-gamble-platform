{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Gebruikers beheren")

@section('content_header')
    <h1>Manage users</h1>
@stop

@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible mt-2">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{\Session::get('success')}}
        </div>
    @endif
    @if (\Session::has('error'))
        <div class="alert alert-danger alert-dismissible mt-2">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{\Session::get('error')}}
        </div>
    @endif
    <form role="form">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="id">Find by username</label>
                    <select class="custom-select select2-search-controller" name="user_id" id="userNameFilter"
                            style="width: 100%">
                        <option value="">All users</option>
                        @foreach($usersAll as $user)
                            <option id="user_{{$user->id}}"
                                    value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary m-1">Filter users</button>

                    <a href="{{route ('admin.user.index')}}" class="btn btn-danger m-1">Reset filters</a>
                </div>
            </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="status_id">Find by status</label>
                        <select class="custom-select select2-search-controller" name="status_id" id="userNameFilter"
                                style="width: 100%">
                            <option value="">All statusses</option>
                            @foreach($statuses as $status)
                                <option id="status_{{$status->id}}"
                                        value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
    </form>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Paid $</th>
                    <th scope="col">Free $</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                @foreach ($users as $user)
                    @if($user->role_id === 2)
                        <tbody>
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->paid_balance}}</td>
                            <td>{{$user->free_balance}}</td>
                            <td>Moderator</td>
                            <td><a href="{{ route('admin.user.edit', $user->id) }}"
                                   class="btn btn-primary">Manage</a>
                                @if(!$user->isFlagged())
                                    <a class="btn btn-warning" data-toggle="modal" data-target="#confirm"
                                       data-action="flag" data-id="{{ $user->id }}"
                                       data-user="{{ $user->name }}" data-toggle="tooltip" data-placement="bottom"
                                       title="Flag this user">
                                        Flag
                                    </a>
                                @else
                                    <a class="btn btn-success" data-toggle="modal" data-target="#confirm"
                                       data-action="unflag" data-id="{{ $user->id }}" data-user="{{ $user->name }}"
                                       data-toggle="tooltip" data-placement="bottom"
                                       title="Unflag this user">
                                        Unflag
                                    </a>
                                @endif
                                @if(!$user->isMuted())
                                    <a class="btn btn-warning" data-toggle="modal" data-target="#confirm"
                                       data-action="mute" data-id="{{ $user->id }}" data-user="{{ $user->name }}"
                                       data-toggle="tooltip" data-placement="bottom"
                                       title="Mute this user">
                                        Mute
                                    </a>
                                @else
                                    <a class="btn btn-success" data-toggle="modal" data-target="#confirm"
                                       data-action="unmute" data-id="{{ $user->id }}" data-user="{{ $user->name }}">
                                        Unmute
                                    </a>
                                @endif
                                @if(!$user->isBanned())
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#confirm"
                                       data-action="ban" data-id="{{ $user->id }}" data-user="{{ $user->name }}">
                                        Ban
                                    </a>
                                @else
                                    <a class="btn btn-success" data-toggle="modal" data-target="#confirm"
                                       data-action="unban" data-id="{{ $user->id }}" data-user="{{ $user->name }}">
                                        Unban
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
                @foreach ($users as $user)
                    @if($user->role_id === 1)
                        <tbody>
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->paid_balance}}</td>
                            <td>{{$user->free_balance}}</td>
                            <td> User</td>
                            <td><a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary">Manage</a>
                                @if(!$user->isFlagged())
                                    <a class="btn btn-warning" data-toggle="modal" data-target="#confirm"
                                       data-action="flag" data-id="{{ $user->id }}"
                                       data-user="{{ $user->name }}" data-toggle="tooltip" data-placement="bottom"
                                       title="Flag this user">
                                        Flag
                                    </a>
                                @else
                                    <a class="btn btn-success" data-toggle="modal" data-target="#confirm"
                                       data-action="unflag" data-id="{{ $user->id }}" data-user="{{ $user->name }}"
                                       data-toggle="tooltip" data-placement="bottom"
                                       title="Unflag this user">
                                        Unflag
                                    </a>
                                @endif
                                @if(!$user->isMuted())
                                    <a class="btn btn-warning" data-toggle="modal" data-target="#confirm"
                                       data-action="mute" data-id="{{ $user->id }}" data-user="{{ $user->name }}"
                                       data-toggle="tooltip" data-placement="bottom"
                                       title="Mute this user">
                                        Mute
                                    </a>
                                @else
                                    <a class="btn btn-success" data-toggle="modal" data-target="#confirm"
                                       data-action="unmute" data-id="{{ $user->id }}" data-user="{{ $user->name }}">
                                        Unmute
                                    </a>
                                @endif
                                @if(!$user->isBanned())
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#confirm"
                                       data-action="ban" data-id="{{ $user->id }}" data-user="{{ $user->name }}">
                                        Ban
                                    </a>
                                @else
                                    <a class="btn btn-success" data-toggle="modal" data-target="#confirm"
                                       data-action="unban" data-id="{{ $user->id }}" data-user="{{ $user->name }}">
                                        Unban
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        </tbody>
            </table>
        </div>

        <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title color-text-black" id="exampleModalLabel">Confirm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body color-text-black" id="dynamicWarningText">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form id="confirm_form" method="POST">
                            @csrf
                            @method('post')
                            <input type="hidden" name="id" id="id" readonly>
                            <input type="hidden" name="action" id="action" readonly>
                            <button type="submit" class="btn btn-danger" id="confirm_formbtn"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('css')
    <link href="{{ asset('css/admin_custom.css') }}" rel="stylesheet">
@endsection

@section('plugins.Select2')

@endsection


@section('js')

    <script>
        $(document).ready(function () {
            $('.select2-search-controller').select2({
                width: 'resolve',
            })
        });
    </script>

    <script>
        document.getElementById('userNameFilter').onchange = function () {
            localStorage.setItem('selectedName', document.getElementById('userNameFilter').value);
        };
        if (localStorage.getItem('selectedName')) {
            document.getElementById('user_' + localStorage.getItem('selectedName')).selected = true;
        }
        ;
    </script>

    <script>
        $('#confirm').on('show.bs.modal', function (event) {
            //Grab all data needed to fill modal form
            let button = $(event.relatedTarget);
            let id = button.data('id');
            let user = button.data('user');
            let action = button.data('action');
            let modal = $(this);

            //Set all default confirm modal/form values
            modal.find('#confirm_form').attr('action', `/dashboard/admin/users/${id}/updateStatus`);
            modal.find('#action').val(`${action}`);
            modal.find('#id').val(id);

            //Adjust modal content dynamically
            switch (action) {
                case 'flag' :
                    modal.find('#dynamicWarningText').html(`Are you sure you want to flag <b>${user}</b>?`);
                    $("#confirm_formbtn").html('Flag user');
                    break;
                case 'mute' :
                    modal.find('#dynamicWarningText').html(`Are you sure you want to mute <b>${user}</b>?`);
                    $("#confirm_formbtn").html('Mute user');
                    break;
                case 'ban' :
                    modal.find('#dynamicWarningText').html(`Are you sure you want to ban <b>${user}</b>?`);
                    $("#confirm_formbtn").html('Ban user');
                    break;
                case 'unflag' :
                    modal.find('#dynamicWarningText').html(`Are you sure you want to unflag <b>${user}</b>?`);
                    $("#confirm_formbtn").html('Unflag user');
                    break;
                case 'unmute' :
                    modal.find('#dynamicWarningText').html(`Are you sure you want to unmute <b>${user}</b>?`);
                    $("#confirm_formbtn").html('Unmute user');
                    break;
                case 'unban' :
                    modal.find('#dynamicWarningText').html(`Are you sure you want to unban <b>${user}</b>?`);
                    $("#confirm_formbtn").html('Unban user');
                    break;
                default:
                    modal.find('#dynamicWarningText').val('default value')
            }
        });
    </script>

@endsection
