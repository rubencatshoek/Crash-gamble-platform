@extends('adminlte::page')

@section('title', "Edit achievement")

@section('content_header')
    <h1>Edit achievement <a class="ml-2 btn btn-primary btn-sm" href="{{ route('achievement.index') }}">Back</a></h1>
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
        <div class="col-12 col-md-6">
            <form method="POST" action="{{ route('achievement.update', $achievement->id) }}">
                @csrf
                @method('PUT')


                <label for="name" class="col-form-label pt-3">Name</label>
                <input required class="input-dark form-control @error("name") alert-danger @enderror " type="text"
                       value="{{old('name') ?? $achievement->name}}"
                       name="name" id="name">
                @error("name")
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="description" class="col-form-label">Description</label>
                <input required class="input-dark form-control @error("description") alert-danger @enderror " type="text"
                       value="{{old('description') ?? $achievement->description}}"
                       name="description" id="description">
                @error("description")
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="logic_added" class="col-form-label">Achievement developed</label>
                <select class="input-dark text-white form-control" name="logic_added" id="logic_added">
                    <option value="0" @if($achievement->logic_added === 0) selected @endif>No</option>
                    <option value="1" @if($achievement->logic_added === 1) selected @endif>Yes</option>
                </select>

                <br>
                <button type="submit" class="btn btn-primary">Edit FAQ</button>
                <a class="btn btn-danger ml-1" href="{{ route('achievement.index') }}">Cancel</a>
            </form>
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
