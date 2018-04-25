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
        <h2>{{ $question->title }}</h2>
        <p class="lead">{{ $question->description }}</p>
    </div>
@endsection