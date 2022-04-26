<div class="text-center fw-bold mt-5"><h3>{{ $answersCount . " " . Str::plural('Answer', $answersCount) }}</h3></div>

    @include('partials.message')

    @foreach ($answers as $answer)                
        <div class="topic-post d-flex @if (!empty($question->best_answer_id)) reply border-color @else bg-light border-default @endif mt-5 p-4 p-md-5 border-top border-width-5">
            <div class="flex-column me-4 text-center">
                <a href="#" class="vote-up" title="This Answer is useful"><i class="icon-caret-up1"></i></a>
                <strong class="d-block votes-count mb-4">{{ $answer->votes_count }}</strong>
                <a href="#" class="vote-down" title="This Answer is not useful"><i class="icon-caret-down1"></i></a>
                <a href="#" class="bookmark" title="Accept this Answer"><i class="icon-check"></i></a>
            </div>
            <div class="flex-grow-1">
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

        </div>
    @endforeach