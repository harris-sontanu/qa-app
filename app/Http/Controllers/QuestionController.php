<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        // $this->authorizeResource(Question::class, 'question');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $questions = Question::with('user');
        if ($sort = $request->sort AND $sort == 'latest') {
            $questions = $questions->latest();
        } else if ($sort = $request->sort AND $sort == 'popular') {
            $questions = $questions->popular();
        } else {
            $questions = $questions->latest();
        }
        $questions = $questions->paginate(5)->withQueryString();

        return view('pages.questions', compact('questions', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        $validated = $this->handleRequest($request);
        $request->user()->questions()->create($validated);

        return redirect()->route('questions.index')->with('success', "Your question has been submitted");
    }

    private function handleRequest($request)
    {
        $data = $request->validated();

        if ($request->hasFile('doc')) {
            $attachment = $request->file('doc');
            $path = $attachment->store('attachment', 'public');
            $data['attachment'] = $path;
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {   
        $question->increment('views');
        
        return view('pages.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $this->authorize('update', $question);

        return view('pages.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        $this->authorize('update', $question);
        $validated  = $this->handleRequest($request);
        $question->update($validated);

        return redirect()->route('questions.index')->with('success', "Your question has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $this->authorize('delete', $question);
        $attachment = $question->attachment;
        $question->delete();
        if (!empty($attachment)) $this->removeAttachmentFile($attachment);

        return redirect()->route('questions.index')->with('success', "Your question has been deleted");
    }

    private function removeAttachmentFile($attachment)
    {
        if (Storage::disk('public')->exists($attachment)) 
        {
            Storage::disk('public')->delete($attachment);
        }
    }
}
