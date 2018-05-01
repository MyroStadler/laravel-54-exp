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
        <h2>Edit question {{ $question->id }}</h2>
        <form action="{{ route('questions.update', $question->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <label for="title">Question</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $question->title }}" />
            <label for="description">More information</label>
            <textarea name="description" id="description" class="form-control">{{ $question->description }}</textarea>
            <input style="margin-top: 20px" type="submit" class="btn btn-primary" value="Save question" />
        </form>
    </div>
@endsection