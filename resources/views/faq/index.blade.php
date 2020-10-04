@extends('layouts.app')

@section('content')
    <section class="background-secondary text-white">
        <div class="spacer pt-5 d-sm-none d-md-none">
        </div>
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-12 text-center pb-4">
                    <h2 class="font-weight-bold">Frequently asked questions</h2>
                    <p class="lead pt-3 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet.</p>
                </div>
            </div>

            <div class="text-center pb-5">
                <h5 class="font-weight-bold pb-3">Jump to category</h5>
                @foreach($categories as $category)
                    <a class="text-grey px-2 text-decoration-none" href="#{{$category->name}}">{{$category->name}}</a> //
                @endforeach
            </div>

            <div class="row">
                @foreach ($faqs as $faq)

                    <div class="col-lg-12 text-right text-grey pt-3">
                        <p id="{{ $faq->category->name }}" class="pb-3">Category: {{ $faq->category->name }}</p>
                    </div>

                    <div class="col-lg-12 text-center pb-3">
                        <a class="text-white text-decoration-none" data-toggle="collapse"
                           href="#collapseExample{{ $faq->id }}" role="button" aria-expanded="false"
                           aria-controls="collapseExample">
                            <div class="background-main py-3">
                                {{ $faq->question }}

                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                     class="bi bi-arrow-down-circle-fill float-right mr-3" fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                                </svg>
                            </div>
                        </a>
                        <div class="collapse" id="collapseExample{{ $faq->id }}">
                            <div class="card card-body background-main">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('layouts.footer')
@endsection
