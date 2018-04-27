@extends('template')

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
        <form action="{{ isset($question) ? route('questions.update', $question->id) : route('questions.store') }}" method="post">
            @if(isset($question))
                <h2>Edit question {{ $question->id }}</h2>
                <input type="hidden" name="question_id" value="{{ $question->id }}" />
            @else
                <h2>Ask a question</h2>
            @endif
            {{ csrf_field() }}
            <label for="title">Question</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ isset($question) ? $question->title : '' }}" />
            <label for="description">More information</label>
            <textarea name="description" id="description" class="form-control">{{ isset($question) ? $question->description : '' }}</textarea>
            <input style="margin-top: 20px" type="submit" class="btn btn-primary" value="Submit question" />
        </form>
    </div>
@endsection