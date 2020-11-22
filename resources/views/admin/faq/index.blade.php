{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Manage FAQ")

@section('content_header')
    <h1>Manage FAQ <a class="ml-2 btn btn-success btn-sm" href="{{ route('faq.create') }}">Create FAQ</a></h1>
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
                    <th scope="col">Category</th>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($faqs as $faq)
                    <tr>
                        <td>{{ $faq->id }}</td>
                        <td>{{ $faq->category->name }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td>
                            <form class="form-check-inline" method="POST" action="{{ route('faq.destroy', $faq->id) }}">
                                @csrf
                                @method('DELETE')
                            <a class="btn btn-primary" href="{{ route('faq.edit', $faq->id) }}"><i class="fas fa-edit"></i></a>&nbsp;
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
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
