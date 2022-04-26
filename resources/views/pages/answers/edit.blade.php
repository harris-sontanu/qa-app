@extends('layouts.app')

@section('title', 'Edit Answer')
@section('content')

<!-- Page Title
============================================= -->
<section id="page-title" class="bg-color py-6 page-title-center text-center">
    <div class="container">
        <h2 class="h2" style="font-weight: 800">Edit Answer</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="alt-color" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a class="alt-color" href="{{ route('questions.index') }}">Questions</a></li>
            <li class="breadcrumb-item text-black-50 active" aria-current="page">Edit Answer</li>
        </ol>
    </div>
</section>

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container mw-md">

            <form class="row mb-0" action="{{ route('questions.answers.update', [$question->slug, $answer->id]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col-12 form-group mb-4">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" class="form-control tinymce @error('body') is-invalid @enderror" cols="30" rows="10">{{ $answer->body }}</textarea>
                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @endif
                </div>
                <div class="clear"></div>
                <div class="col-6 form-group">
                    <small class="text-muted">Maximum file size allowed is 2048 KB.</small>
                    <div class="form-file">
                        <input type="file" name="doc" class="form-control @error('doc') is-invalid @enderror" id="file-input">
                    </div>
                    @error('doc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @endif
                </div>
                <div class="col-12">
                    <button type="submit" class="button button-large bg-alt border border-width-2 rounded-1 fw-medium nott ls0 ms-0">Update</button>

                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="button button-large button-border border-default h-bg-danger rounded-1 fw-medium nott ls0 ms-0">Cancel</button>
                </div>
            </form>

        </div>
    </div>
</section><!-- #content end -->

@endsection
