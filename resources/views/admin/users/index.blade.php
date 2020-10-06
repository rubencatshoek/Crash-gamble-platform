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
    <form role="form">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="id">Find by username</label>
                    <select class="custom-select select2-search-controller" name="user_id" id="userNameFilter"
                            style="width: 100%">
                        <option value="">All users</option>
                        @foreach($users as $user)
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
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
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
                @foreach ($filteredUsers as $user)
                    @if($user->role_id === 3)
                        <tbody>
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->paid_balance}}</td>
                            <td>{{$user->free_balance}}</td>
                            <td>Moderator</td>
                            <td><a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary">Manage</a>
                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#confirm"
                                   data-action="freeplay" data-id="{{ $user->id }}" data-user="{{ $user->name }}">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cash-stack"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14 3H1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1h-1z"/>
                                        <path fill-rule="evenodd"
                                              d="M15 5H1v8h14V5zM1 4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H1z"/>
                                        <path
                                            d="M13 5a2 2 0 0 0 2 2V5h-2zM3 5a2 2 0 0 1-2 2V5h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 13a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                                    </svg>
                                </a>
                                <a href="#" class="btn btn-warning">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-flag-fill"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                                    </svg>
                                </a>
                                <a href="#" class="btn btn-warning">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-volume-mute-fill"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06zm7.137 2.096a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708l4-4a.5.5 0 0 1 .708 0z"/>
                                        <path fill-rule="evenodd"
                                              d="M9.146 5.646a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-danger">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hammer"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.812 1.952a.5.5 0 0 1-.312.89c-1.671 0-2.852.596-3.616 1.185L4.857 5.073V6.21a.5.5 0 0 1-.146.354L3.425 7.853a.5.5 0 0 1-.708 0L.146 5.274a.5.5 0 0 1 0-.706l1.286-1.29a.5.5 0 0 1 .354-.146H2.84C4.505 1.228 6.216.862 7.557 1.04a5.009 5.009 0 0 1 2.077.782l.178.129z"/>
                                        <path fill-rule="evenodd"
                                              d="M6.012 3.5a.5.5 0 0 1 .359.165l9.146 8.646A.5.5 0 0 1 15.5 13L14 14.5a.5.5 0 0 1-.756-.056L4.598 5.297a.5.5 0 0 1 .048-.65l1-1a.5.5 0 0 1 .366-.147z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                @foreach ($filteredUsers as $user)
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
                        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="dynamicWarningText">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form id="confirm_form" method="POST">
                            @csrf
                            @method('post')
                            <button type="submit" class="btn btn-danger" id="confirm_formbtn"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/main.css">
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
            modal.find('#confirm_formbtn').attr('data-action', `/dashboard/admin/projecten/${id}/bijwerken`);
            modal.find('#action').val(`${action}`);
            modal.find('#id').val(id);
            modal.find('#delete_contact_id').attr('action', "/dashboard/admin/contact/" + id);

            //Adjust modal content dynamically
            switch (action) {
                case 'freeplay' :
                    modal.find('#dynamicWarningText').html(`Are you sure you want to give <b>${user}</b> freeplay?`);
                    $("#confirm_formbtn").html('Give freeplay');
                    break;
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
                default:
                    modal.find('#dynamicWarningText').val('default value')
            }
        });
    </script>

@endsection
