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

            <div class="row align-items-center mb-4">
                <div class="col-sm mb-3 mb-sm-0">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-signin" class="button bg-alt py-2 rounded-1 fw-medium nott ls0 ms-0 ms-sm-1 h-op-09">Ask Question</a>
                </div>
                <div class="col-sm-auto">
                    <select class="form-select" aria-label="Default select example">
                        <option value="latest">Most Recent</option>
                        <option value="popular">Popular</option>
                    </select>
                </div>
            </div>

            <div class="mw-md mx-auto">
                <ul class="list-unstyled mb-4">
                    <li>
                        @if (count($questions) > 0)

                            @foreach ($questions as $question)
                                
                                <ul class="topic list-unstyled row mx-0 justify-content-between align-items-center border-top-0">
                                    <li class="entry mb-0">
                                        <div class="row">
                                            <div class="col-lg-2 d-flex flex-column text-end pt-1 small">
                                                <div class="vote mb-2">
                                                    <strong>{{ $question->votes }}</strong> votes
                                                </div>
                                                @if ($question->answers > 0 && !empty($question->best_answer_id))   
                                                    <div class="status mb-2">
                                                        <span class="bg-success rounded text-white px-2 py-1"><i class="icon-check me-1"></i><strong>{{ $question->answers }}</strong> answers</span>
                                                    </div>          
                                                @elseif ($question->answers > 0 && empty($question->best_answer_id))
                                                    <div class="status mb-2">
                                                        <span class="border border-success rounded text-success px-2 py-1"><strong>{{ $question->answers }}</strong> answers</span>
                                                    </div> 
                                                @else                                       
                                                    <div class="status mb-2">
                                                        <strong>{{ $question->answers }}</strong> answers
                                                    </div>                                                     
                                                @endif
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