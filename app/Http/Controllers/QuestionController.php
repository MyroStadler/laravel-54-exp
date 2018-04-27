<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Auth;

class QuestionController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->paginate(5);

        return view('questions.index')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $question = new Question();
        $question->title = $request->title;
        $question->description = $request->description;
        $question->user()->associate(Auth::id());
        if($question->save()) {
            return redirect()->route('questions.show', $question->id);
        }
        return redirect()->route('questions.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        if($question = Question::find($id)) {
//            return view('questions.show')->with('question', $question);
//        }
//        return 'Question not found';
        $question = Question::findOrFail($id);
        return view('questions.show')->with('question', $question);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        if(Auth::id() != $question->user->id){
            abort(403);
        }
        return view('questions.create')->with(['question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $question = Question::findOrFail($id);
        if(Auth::id() != $question->user->id){
            abort(403);
        }
        $question->title = $request->title;
        $question->description = $request->description;
        $question->saveOrFail();
        return view('questions.show', $question->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
