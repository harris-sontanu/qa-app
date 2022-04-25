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

            <div class="topic-post">
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

            <div class="text-center fw-bold mt-5"><h3>{{ $question->answers_count . " " . Str::plural('Answer', $question->answers_count) }}</h3></div>

            @foreach ($question->answers as $answer)                
                <div class="topic-post @if (!empty($question->best_answer_id)) reply border-color @else bg-light border-default @endif mt-5 p-4 p-md-5 border-top border-width-5">
                    @if (!empty($question->best_answer_id))
                    <div class="row justify-content-between align-items-center mb-4">
                        <div class="col-9">
                            <h2 class="mb-0 fw-bold"><i class="icon-line-check text-success"></i> Best Answer</h2>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="badge bg-success text-white p-2">Solved</a>
                        </div>
                    </div>
                    @endif
                    <div class="row g-0 justify-content-between align-items-center border-bottom @if (!empty($question->best_answer_id)) border-color border-top py-3 @else border-default pb-3 @endif mb-4">
                        <div class="col-9">
                            <div class="d-flex align-items-center">
                                <img src="{{ $answer->user->avatar(64, 0.33) }}" alt="Author" class="rounded-circle me-2" width="50" height="50">
                                <div>
                                    <h5 class="mb-0 h6 fw-semibold align-middle"><a class="text-dark" href="#">{{ $answer->user->name }}</a></h5>
                                    <small class="text-muted mb-0 fw-normal">{{ $answer->created_at->format('l, j F Y, H:i') }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <a href="#" id="editlink2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-line-ellipsis icon-2x alt-color"></i></a>
                            <div class="dropdown-menu dropdown-menu-links rounded shadow-sm dropdown-menu-end py-0 m-0" aria-labelledby="editlink2">
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

                    {!! $answer->body !!}

                </div>
            @endforeach

            <div id="message-reply" class="topic-form mt-5">
                <h3 class="h2 fw-bolder mb-4">Reply to the Message</h3>
                <form class="row" action="#" method="post" enctype="multipart/form-data">
                    <div class="col-12 form-group mb-4">
                        <textarea name="post-message" id="post-message" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="clear"></div>
                    <div class="col-6 form-group">
                        <small class="text-muted">Maximum file size allowed is 2048 KB.</small>
                        <div class="form-file">
                            <input type="file" class="form-control" id="file-input">
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="col-12 form-group mb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label nott ls0 mb-0 fw-semibold" for="inlineCheckbox1">Set as a Private Reply</label>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="col-12 form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label nott ls0 mb-0 fw-semibold" for="inlineCheckbox2">Email me when Someone Replies</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" class="button button-large bg-alt py-2 rounded-1 fw-medium nott ls0 ms-0">Submit Now</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section><!-- #content end -->

@endsection
