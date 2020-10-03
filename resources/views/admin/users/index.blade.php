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

                    <a href="/dashboard/admin/users" class="btn btn-danger m-1">Reset filters</a>
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
                    <th scope="col">Role</th>
                </tr>
                </thead>
                @foreach ($filteredUsers as $user)
                    @if($user->role_id === 2)
                        <tbody>
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>Admin</td>
                            <td><a href="/admin/users/{{$user->id}}/edit" class="btn btn-primary">Manage</a></td>
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
                            <td> User</td>
                            <td><a href="/dashboard/gebruikers/{{$user->id}}" class="btn btn-primary">Manage</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        </tbody>
            </table>
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

    <script type="text/javascript">
        document.getElementById('userNameFilter').onchange = function () {
            localStorage.setItem('selectedName', document.getElementById('userNameFilter').value);
        };
        if (localStorage.getItem('selectedName')) {
            document.getElementById('user_' + localStorage.getItem('selectedName')).selected = true;
        };
    </script>

@endsection
