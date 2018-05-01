@extends('layouts.template')

@section('content')
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">
                {{ $error }}
            </p>
            @endforeach
        @endif
    </div>
    <div class="container">
        <h2>{{ $question->title }}</h2>
        <p class="lead">{{ $question->description }}</p>
        <p>
            Asked by {{ $question->user->name }}, {{ $question->created_at->diffForHumans() }}
        </p>
        @if(Auth::id() === $question->user->id)
            <div>
                <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form style="display: inline"
                      action="{{ route('questions.destroy', $question->id) }}"
                      method="post"
                      onsubmit="return confirm('Are you sure?')">
                    <input type="hidden" name="_method" value="DELETE" />
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-sm btn-primary" value="Delete" />
                </form>
            </div>
        @endif
    </div>
    <div class="container">
        <h2>Previous answers</h2>
        @if ($question->answers->count() > 0)
            @foreach ($question->answers as $answer)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>{{ $answer->content }}</p>
                        <p class="small">Answered by {{ $answer->user->name }}, {{ $answer->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>No answers yet, please add one?</p>
        @endif
    </div>
    <div class="container">
        @if(Auth::guest())
            <a href="{{ route('login', ['from' => route('questions.show', $question->id)]) }}" class="btn btn-primary">Login to answer</a>
        @else
            <form action="{{ route('answers.store') }}" method="post">
                {{ csrf_field() }}
                <h4>Answer this question</h4>
                <textarea class="form-control" name="content"></textarea>
                <input type="hidden" value="{{ $question->id }}" name="question_id" />
                <input style="margin-top: 20px" type="submit" value="Submit your answer" class="btn btn-primary" />
            </form>
        @endif
    </div>
@endsection