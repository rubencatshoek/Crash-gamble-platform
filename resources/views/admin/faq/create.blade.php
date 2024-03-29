@extends('adminlte::page')

@section('title', "Create FAQ")

@section('content_header')
    <h1>Create FAQ <a class="ml-2 btn btn-primary btn-sm" href="{{ route('faq.index') }}">Back</a></h1>
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
            <form method="POST" action="{{ route('faq.store') }}">
                @csrf
                <label for="category" class="col-form-label">Category</label><br>
                <select class="input-dark text-white form-control" name="category_id" id="category">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                </select>

                <label for="question" class="col-form-label pt-3">Question</label>
                <input required class="input-dark form-control @error("question") alert-danger @enderror " type="text" value="{{old('question')}}"
                       name="question" id="question">
                @error("question")
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="answer" class="col-form-label">Answer</label>
                <input required class="input-dark form-control @error("answer") alert-danger @enderror " type="text" value="{{old('answer')}}"
                       name="answer" id="answer">
                @error("answer")
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <br>
                <button type="submit" class="btn btn-success">Create</button>
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
