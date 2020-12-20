{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Manage achievement")

@section('content_header')
    <h1>Manage achievements <a class="ml-2 btn btn-success btn-sm" href="{{ route('achievement.create') }}">Create
            achievement</a></h1>
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

    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th class="w-25" scope="col">Name</th>
                    <th class="w-25" scope="col">Description</th>
                    <th scope="col">Developed</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($achievements as $achievement)
                    <tr>
                        <td>{{ $achievement->id }}</td>
                        <td>{{ $achievement->name }}</td>
                        <td>{{ $achievement->description }}</td>
                        <td>
                            @if($achievement->logic_added === 1)
                                <p>Yes</p>
                            @else
                                <p>No</p>
                            @endif
                        </td>
                        <td>
                            @if($achievement->logic_added === 0)
                                <form class="form-check-inline" method="POST"
                                      action="{{ route('achievement.destroy', $achievement->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" href="{{ route('achievement.edit', $achievement->id) }}"><i
                                            class="fas fa-edit"></i></a>&nbsp;
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                @else
                                <p>Logic has been added to the code base. Contact the developers incase you want to edit this specific achievement</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('css/admin_custom.css') }}" rel="stylesheet">
@endsection

@section('plugins.Select2')

@endsection

@section('js')

@endsection
