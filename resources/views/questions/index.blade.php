@extends('template')

@section('content')
    <div class="container">
        <h2>Recent questions</h2>
        @foreach($questions as $question)
            <div class="well">
                <h3>{{ $question->title }}</h3>
                <p>{{ $question->description }}</p>
                <a href="{{ route('questions.show', $question->id) }}" class="btn btn-primary btn-sm">View details</a>
            </div>
        @endforeach

        {{ $questions->links() }}
    </div>
@endsection