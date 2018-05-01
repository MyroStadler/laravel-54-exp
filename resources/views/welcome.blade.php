@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>Ask a question!</h1>
            <p>Ask about Laravel here</p>
            <p><a href="{{ route('questions.create') }}" class="btn btn-primary btn-lg" role="button">Ask now</a></p>
        </div>
    </div>
    @include('_includes/recent-questions')
@endsection