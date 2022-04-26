@extends('layouts.app')

@section('title', 'Edit question')
@section('content')

<!-- Page Title
============================================= -->
<section id="page-title" class="bg-color py-6 page-title-center text-center">
    <div class="container">
        <h2 class="h2" style="font-weight: 800">Edit question</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="alt-color" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a class="alt-color" href="{{ route('questions.index') }}">Questions</a></li>
            <li class="breadcrumb-item text-black-50 active" aria-current="page">Edit Question</li>
        </ol>
    </div>
</section>

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container mw-md">

            <form class="row mb-0" action="{{ route('questions.update', $question->slug) }}" method="post" novalidate enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col-12 form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control form-control-lg @error('title') is-invalid @enderror" placeholder="e.g. Lorem ipsum dolor sit amet consectetuer adipiscing elit?" value="{{ $question->title }}" />
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @endif
                </div>
                <div class="col-12 form-group mb-4">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" class="form-control tinymce @error('body') is-invalid @enderror" cols="30" rows="10">{{ $question->body }}</textarea>
                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @endif
                </div>
                <div class="clear"></div>
                @if ( ! empty($question->attachment))
                    <div class="col-6 form-group">
                        <label>Attachment</label>
                        <a href="{{ $question->attachment_url }}" class="button button-small button-rounded button-border m-0"><i class="icon-file-{{ $question->attachment_ext }} me-1"></i>{{ $question->attachment_name }}</a>
                    </div>
                @else
                    <div class="col-6 form-group">
                        <small class="text-muted">Maximum file size allowed is 2048 KB.</small>
                        <div class="form-file">
                            <input type="file" name="doc" class="form-control @error('doc') is-invalid @enderror" id="file-input">
                        </div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @endif
                    </div>
                @endif
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
                    <button type="submit" class="button button-large bg-alt border border-width-2 rounded-1 fw-medium nott ls0 ms-0">Update</button>
                    <a href="{{ route('questions.index') }}" class="button button-large button-border border-default h-bg-danger rounded-1 fw-medium nott ls0 ms-0">Cancel</a>
                </div>
            </form>

        </div>
    </div>
</section><!-- #content end -->

@endsection
