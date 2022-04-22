@extends('layouts.app')

@section('content')

<!-- Page Title
============================================= -->
<section id="page-title" class="bg-color py-6 page-title-center text-center">
    <div class="container">
        <h2 class="h2" style="font-weight: 800">All Questions</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="alt-color" href="#">Home</a></li>
            <li class="breadcrumb-item"><a class="alt-color" href="#">Question</a></li>
            <li class="breadcrumb-item text-black-50 active" aria-current="page">All Topics</li>
        </ol>
    </div>
</section>

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container mw-md">

            <div class="mw-md mx-auto">
                <ul class="list-unstyled mb-4">
                    <li>
                        @if (count($questions) > 0)

                            @foreach ($questions as $question)
                                
                                <ul class="topic list-unstyled row mx-0 justify-content-between align-items-center border-top-0">
                                    <li class="entry mb-0">
                                        <div class="row">
                                            <div class="col-lg-2 d-flex flex-column text-end pt-1">
                                                <div class="vote pb-2">
                                                    <strong>{{ $question->votes }}</strong> votes
                                                </div>
                                                <div class="status pb-2">
                                                    <strong>{{ $question->answers }}</strong> answers
                                                </div>
                                                <div class="view text-muted">
                                                    <strong>{{ $question->views }}</strong> views
                                                </div>
                                            </div>
                                            <div class="col-lg-10">
                                                <h3 class="mb-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                                {{ Str::limit($question->body, 200) }}
                                                <div class="mt-2 d-flex justify-content-between">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item"><a href="#"><span class="badge bg-secondary">javascript</span></a></li>
                                                        <li class="list-inline-item"><a href="#"><span class="badge bg-secondary">laravel</span></a></li>
                                                        <li class="list-inline-item"><a href="#"><span class="badge bg-secondary">php</span></a></li>
                                                    </ul>
                                                    <div class="text-end small">
                                                        <a href="#" class="text-default">
                                                            <img class="align-text-bottom me-1" alt="{{ $question->user->name }}" src="demos/forum/images/user.png" width="16" height="16">
                                                            {{ $question->user->name }}
                                                        </a>
                                                        <span class="text-muted">asked {{ $question->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            @endforeach
                            
                        @else
                            
                        @endif
                        
                    </li>
                </ul>

                {{ $questions->links() }}
            </div>

        </div>

    </div>
</section><!-- #content end -->

@endsection