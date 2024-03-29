<div class="text-center fw-bold mt-5">
    <h3>{{ $answersCount . ' ' . Str::plural('Answer', $answersCount) }}</h3>
</div>

@include('partials.message')

@forelse ($answers as $answer)
    <div class="topic-post d-flex @if ($answer->is_accepted) reply border-color @else bg-light border-default @endif mt-5 p-4 p-md-5 border-top border-width-5">
    <div class="flex-column me-4 text-center">
        <a role="button" href="{{ route('answers.vote', $answer->id) }}" data-vote="1" class="answer-vote vote-up" title="This Answer is useful"><i class="icon-caret-up1"></i></a>
        <strong class="d-block votes-count mb-4">{{ $answer->votes_count }}</strong>
        <a role="button" href="{{ route('answers.vote', $answer->id) }}" data-vote="-1" class="answer-vote vote-down" title="This Answer is not useful"><i class="icon-caret-down1"></i></a>
        @if (Auth::check() and Auth::user()->can('accept', $answer))
            <a role="button" href="{{ route('answers.accept', $answer->id) }}" class="bookmark {{ $answer->status }} accept-answer" title="Accept this Answer"><i class="icon-check"></i></a>
        @else
            @if ($answer->is_accepted)
                <span class="bookmark {{ $answer->status }} " title="The owner of this question accepted this answer as best answer"><i class="icon-check"></i></span>
            @endif
        @endif
    </div>
    <div class="flex-grow-1">
        @if ($answer->is_accepted)
            <div class="row justify-content-between align-items-center mb-4">
                <div class="col-9">
                    <h2 class="mb-0 fw-bold">Best Answer</h2>
                </div>
                <div class="col-auto">
                    <a href="#" class="badge bg-success text-white p-2">Solved</a>
                </div>
            </div>
        @endif
        <div class="row g-0 justify-content-between align-items-center border-bottom @if ($answer->is_accepted) border-color border-top py-3 @else border-default pb-3 @endif mb-4">
            <div class="col-9">
                <div class="d-flex align-items-center">
                    <img src="{{ $answer->user->avatar(64, 0.33) }}" alt="Author" class="rounded-circle me-2" width="50" height="50">
                    <div>
                        <h5 class="mb-0 h6 fw-semibold align-middle"><a class="text-dark" href="#">{{ $answer->user->name }}</a></h5>
                        <small class="text-muted mb-0 fw-normal">{{ $answer->created_at->format('l, j F Y, H:i') }}</small>
                    </div>
                </div>
            </div>

            @if (Auth::check() and (Auth::user()->can('update', $answer) or Auth::user()->can('delete', $answer)))
                <div class="col-auto">
                    <a href="#" id="editlink2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-line-ellipsis icon-2x alt-color"></i></a>
                    <div class="dropdown-menu dropdown-menu-links rounded shadow-sm dropdown-menu-end py-0 m-0" aria-labelledby="editlink2">
                        @can('update', $answer)
                            <a class="dropdown-item rounded-top" href="{{ route('questions.answers.edit', [$question->slug, $answer->id]) }}"><i class="icon-line-edit me-2"></i>Edit</a>
                        @endcan
                        @can('delete', $answer)
                            <form action="{{ route('questions.answers.destroy', [$question->slug, $answer->id]) }}" method="post" class="mb-0">
                                @method('DELETE')
                                @csrf
                                <button class="dropdown-item" type="submit"><i class="icon-line-trash-2 me-2"></i>Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endif

        </div>

        {!! $answer->body !!}
    </div>

</div>

@empty

@endforelse
