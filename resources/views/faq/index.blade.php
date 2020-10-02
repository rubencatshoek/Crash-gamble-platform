@extends('layouts.app')

@section('content')
    <section class="background-main text-white">
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

            <div class="row">
                <div class="col-lg-12 text-center pt-3">
                    <h4 class="pb-3">Topic header</h4>
                </div>

                    <div class="col-lg-6 text-center pb-3">
                    <a class="text-white text-decoration-none" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <div class="background-secondary py-3">
                        Frequently asked question?

                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-down-circle-fill float-right mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                        </svg>
                    </div>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body background-secondary">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 text-center pb-3">

                    <a class="text-white text-decoration-none" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <div class="background-secondary py-3">
                            Frequently asked question?

                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-down-circle-fill float-right mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg>
                        </div>
                    </a>
                    <div class="collapse" id="collapseExample2">
                        <div class="card card-body background-secondary">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 text-center pt-3">
                    <h4 class="pb-3">Topic header</h4>
                </div>

                <div class="col-lg-12 text-center pb-3">
                    <a class="text-white text-decoration-none" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <div class="background-secondary py-3">
                            Frequently asked question?

                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-down-circle-fill float-right mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg>
                        </div>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body background-secondary">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="background-secondary text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center pb-4">
                    <h2 class="font-weight-bold">Start playing</h2>
                    <p class="lead pt-3 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        dignissim eros, vitae blandit orci. Suspendisse elementum sapien at lectus consectetur
                        laoreet.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 text-center">

                </div>
                <div class="col-lg-6 text-center">
                    <a class="btn background-brand btn-lg w-100 text-white" href="{{ route('play.index') }}">Play now</a>
                </div>
                <div class="col-lg-3 text-center">

                </div>
            </div>

        </div>
    </section>
    @include('layouts.footer')
@endsection
