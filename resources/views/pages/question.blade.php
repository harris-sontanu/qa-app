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
                                    <li class="entry mb-0 col-sm-10">
                                        <h3 class="mb-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                        {{ Str::limit($question->body, 200) }}
                                        <div class="entry-meta mt-1">
                                            <ul>
                                                <li><a href="#">{{ $question->created_at->diffForHumans() }}</a></li>
                                                <li><a href="#">{{ $question->answers }} Replies</a></li>
                                                @if (!empty($question->best_answer_id))                                                     
                                                    <li><a href="#" class="badge bg-success text-white">Solved</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="col-sm-2">
										<div class="bbp-author">
											<a href="#"><img alt="{{ $question->user->name }}" src="demos/forum/images/user.png"></a>
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