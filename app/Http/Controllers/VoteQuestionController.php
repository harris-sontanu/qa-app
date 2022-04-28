<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VoteQuestionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Question $question)
    {
        $vote = (int) $request->vote;
        Auth::user()->voteQuestion($question, $vote);
    }
}
