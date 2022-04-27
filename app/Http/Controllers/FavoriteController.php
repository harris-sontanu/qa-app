<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Question $question)
    {
        $question->favorites()->attach(Auth::id());
    }

    public function destroy(Question $question)
    {
        $question->favorites()->detach(Auth::id());
    }
}
