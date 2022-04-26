@extends('layouts.app')

@section('title', $question->title)
@section('content')

<!-- Page Title
============================================= -->
<section id="page-title" class="bg-color py-6 page-title-center text-center">
    <div class="container">
        <h2 class="h2" style="font-weight: 800">{{ $question->title }}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="alt-color" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a class="alt-color" href="{{ route('questions.index') }}">Questions</a></li>
            <li class="breadcrumb-item text-black-50 active" aria-current="page">{{ $question->title }}</li>
        </ol>
    </div>
</section>

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container mw-md">

            <div class="topic-post d-flex">
                <div class="flex-column me-4 text-center">
                    <a href="#" class="vote-up" title="This Question is useful"><i class="icon-caret-up1"></i></a>
                    <strong class="d-block votes-count mb-4">{{ $question->votes }}</strong>
                    <a href="#" class="vote-down" title="This Question is not useful"><i class="icon-caret-down1"></i></a>
                    <a href="#" class="bookmark" title="Bookmark this question"><i class="icon-bookmark"></i></a>
                    <span class="d-block text-muted">123</span>
                </div>
                <div class="flex-grow-1">
                    <div class="row g-0 justify-content-between align-items-center border-top border-bottom py-3 mb-4">
                        <div class="col-9">
                            <div class="d-flex align-items-center">
                                <img src="{{ $question->user->avatar(64, 0.33) }}" alt="Author" class="rounded-circle me-2" width="50" height="50">
                                <div>
                                    <h5 class="mb-0 h6 fw-semibold"><a class="text-dark" href="#">{{ $question->user->name }}</a></h5>
                                    <small class="text-muted mb-0 fw-normal">{{ $question->created_at->format('l, j F Y, H:i') }}</small>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-auto">
                            <a href="#" id="editlink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-line-ellipsis icon-2x alt-color"></i></a>
                            <div class="dropdown-menu dropdown-menu-links rounded shadow-sm dropdown-menu-end py-0 m-0" aria-labelledby="editlink">
                                <a class="dropdown-item rounded-top" href="#"><i class="icon-line-edit me-2"></i>Edit</a>
                                <a class="dropdown-item" href="#"><i class="icon-line-circle-cross me-2"></i>Close</a>
                                <a class="dropdown-item" href="#"><i class="icon-line-arrow-up me-2"></i>Stick On Top</a>
                                <a class="dropdown-item" href="#"><i class="icon-line-git-merge me-2"></i>Merge</a>
                                <a class="dropdown-item" href="#"><i class="icon-line-trash-2 me-2"></i>Trash</a>
                                <a class="dropdown-item" href="#"><i class="icon-line-alert-triangle me-2"></i>Spam</a>
                                <a class="dropdown-item" href="#message-reply" data-scrollto="#message-reply"><i class="icon-line-corner-up-left me-2"></i>Reply</a>
                            </div>
                        </div>
                    </div>
    
                    <div class="clear"></div>
    
                    {!! $question->body !!}
    
                    <div class="col-1 p-0">
                        <hr>
                    </div>
    
                    @if (!empty($question->attachment))
                        <div class="attachment-wrapper pt-3">
                            <h4 class="mb-3">Attachment</h4>
                            <a href="{{ $question->attachment_url }}" class="button button-small button-rounded button-border m-0"><i class="icon-file-{{ $question->attachment_ext }} me-1"></i>{{ $question->attachment_name }}</a>
                        </div>
                    @endif
                </div>
            </div>

            @include('pages.answers.index', [
                'answersCount' => $question->answers_count,
                'answers'   => $question->answers
            ])

            @include('pages.answers.create')

        </div>
    </div>
</section><!-- #content end -->

@endsection
