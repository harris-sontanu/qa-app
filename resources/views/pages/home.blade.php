@extends('layouts.app')

@section('content')

<!-- Slider
============================================= -->
<section id="slider" class="slider-element bg-color">
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-6 d-flex align-self-center flex-column pt-5 pb-0 py-lg-6 mb-0 my-lg-4">
                <p class="mb-3 text-larger fw-light">Hello, <strong class="fw-bold"><u>SemiColonWeb</u></strong></p>
                <h2 class="display-4" style="font-weight: 800">Welcome to our Canvas Community.</h2>
                <form action="{{ route('questions.index') }}" method="get">
                    <div class="input-group input-group-lg mt-2 mb-4">
                        <input class="form-control rounded-start border-0" name="q" type="search" placeholder="Search Your Topics.." aria-label="Search">
                        <button class="btn btn-light border-0" type="submit"><i class="icon-line-search"></i></button>
                    </div>
                </form>
                <div>
                    <a href="{{ route('questions.ask') }}" class="button button-large border border-width-2 bg-alt py-2 rounded-1 fw-medium nott ls0 ms-0 ms-sm-1 h-op-09"><i class="icon-line-file-add"></i>Ask A Question</a>
                    <a href="{{ route('questions.index') }}" class="button button-large button-border rounded-1 fw-medium nott h-bg-alt ls0 ms-0"><i class="icon-line-align-left"></i>Browse All Topics</a>
                </div>
            </div>

            <div class="col-lg-6 d-flex align-self-end flex-column">
                <img src="demos/forum/images/hero.svg" alt="Hero Image" style="z-index: 3; transform: translateY(45px);">
            </div>
        </div>
    </div>
    <div class="bg-alt py-5">
        <div class="container">
            <div class="d-flex">
                <h4 class="mb-0"><span class="counter counter-inherit fw-normal text-white"><i class="icon-line-users icon-fw"></i> <span class="color fw-semibold" data-from="100" data-to="12462" data-refresh-interval="150" data-speed="2000"></span> Members Registered.</span></h4>
                <h4 class="mb-0 ms-5"><span class="counter counter-inherit fw-normal text-white"><i class="icon-line-message-circle icon-fw"></i> <span class="color fw-semibold" data-from="100" data-to="340333" data-refresh-interval="100" data-speed="2000"></span> Posts Created.</span></h4>
            </div>
        </div>
    </div>
</section>

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container">

            <div class="row justify-content-center text-center mb-5">
                <div class="col-xl-6 col-lg-8">
                    <h3 class="display-4 fw-bolder mb-3">Latest Questions</h3>
                </div>
            </div>

            <div class="mw-md mx-auto">
                <ul class="list-unstyled mb-4">
                    <li>
                        @if (count($latestQuestions) > 0)

                            @foreach ($latestQuestions as $question)
                                
                                <ul class="topic list-unstyled row mx-0 justify-content-between align-items-center border-top-0">
                                    <li class="entry mb-0">
                                        <h3 class="mb-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                        {!! $question->excerpt !!}
                                        <div class="mt-2 d-flex justify-content-between">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><a href="#"><span class="badge bg-secondary">javascript</span></a></li>
                                                <li class="list-inline-item"><a href="#"><span class="badge bg-secondary">laravel</span></a></li>
                                                <li class="list-inline-item"><a href="#"><span class="badge bg-secondary">php</span></a></li>
                                            </ul>
                                            <div class="text-end small">
                                                <a href="#" class="text-default">
                                                    <img class="align-text-bottom me-1" alt="{{ $question->user->name }}" src="{{ $question->user->avatar(16) }}" width="16" height="16">
                                                    {{ $question->user->name }}
                                                </a>
                                                <span class="text-muted">asked {{ $question->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            @endforeach
                            
                        @else
                            
                        @endif
                        
                    </li>
                </ul>
                
                <div class="text-center"><a href="{{ route('questions.index') }}" class="button button-small button-border button-rounded mx-0">Show more</a></div>
            </div>

        </div>

        <div class="section py-6 my-6" style="background-color: #bfd5dbab">
            <div class="container">
                <div class="row align-items-center col-mb-50">
                    <div class="col-md-6">
                        <img src="demos/forum/images/doc.svg" alt="Doc Image">
                    </div>
                    <div class="col-md-6">
                        <h2 class="display-4 mb-4 fw-bold">Our Documentation</h2>
                        <p>Continually leverage existing reliable users without seamless e-commerce. Professionally mesh interoperable solutions rather than highly efficient infrastructures. Monotonectally administrate tactical functionalities.</p>
                        <a href="#" class="button button-large bg-alt text-white fw-medium py-2 rounded-1 ms-0 ls0 nott"><i class="icon-line-paper"></i>View Documentation</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="clear"></div>

        <div class="container my-4">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6">
                    <h3 class="display-4 fw-bolder mb-3">Most Helpful Members</h3>
                    <p>Without seamless e-commerce professionally mesh</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row justify-content-center col-mb-30 gutter-50 text-center">
                        <div class="col-md-3 col-4">
                            <img src="https://source.unsplash.com/jzY0KRJopEI/120x120" alt="Memebers" width="80" class="rounded-circle mb-2">
                            <h5 class="fw-medium"><a href="demo-forum-profile.html">Jim Séchen</a></h5>
                        </div>
                        <div class="col-md-3 col-4">
                            <img src="https://source.unsplash.com/WNoLnJo7tS8/120x120" alt="Memebers" width="80" class="rounded-circle mb-2">
                            <h5 class="fw-medium"><a href="demo-forum-profile.html">Alan Fresco</a></h5>
                        </div>
                        <div class="col-md-3 col-4">
                            <img src="https://source.unsplash.com/JQFHdpOKz2k/120x120" alt="Memebers" width="80" class="rounded-circle mb-2">
                            <h5 class="fw-medium"><a href="demo-forum-profile.html">Fig Nelson</a></h5>
                        </div>
                        <div class="col-md-3 col-4">
                            <img src="https://source.unsplash.com/FsWi0sBoi8c/120x120" alt="Memebers" width="80" class="rounded-circle mb-2">
                            <h5 class="fw-medium"><a href="demo-forum-profile.html">Pelican Steve</a></h5>
                        </div>
                        <div class="col-md-3 col-4">
                            <img src="https://source.unsplash.com/UcgYvGPqQQ8/120x120" alt="Memebers" width="80" class="rounded-circle mb-2">
                            <h5 class="fw-medium"><a href="demo-forum-profile.html">Pelican Steve</a></h5>
                        </div>
                        <div class="col-md-3 col-4">
                            <img src="https://source.unsplash.com/5vg_SarQimA/120x120" alt="Memebers" width="80" class="rounded-circle mb-2">
                            <h5 class="fw-medium"><a href="demo-forum-profile.html">Russell Sprout</a></h5>
                        </div>
                        <div class="col-md-3 col-4">
                            <img src="https://source.unsplash.com/WZz1u5R5uT4/120x120" alt="Memebers" width="80" class="rounded-circle mb-2">
                            <h5 class="fw-medium"><a href="demo-forum-profile.html">Sir Cumference</a></h5>
                        </div>
                        <div class="col-md-3 col-4">
                            <img src="https://source.unsplash.com/uBqskoy6TW8/120x120" alt="Memebers" width="80" class="rounded-circle mb-2">
                            <h5 class="fw-medium"><a href="demo-forum-profile.html">Theodore Handle</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section><!-- #content end -->

@endsection