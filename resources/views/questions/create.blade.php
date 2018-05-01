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
        <h2>Ask a question</h2>
        <form action="{{ route('questions.store') }}" method="post">
            {{ csrf_field() }}
            <label for="title">Question</label>
            <input type="text" name="title" id="title" class="form-control" />
            <label for="description">More information</label>
            <textarea name="description" id="description" class="form-control"></textarea>
            <input style="margin-top: 20px" type="submit" class="btn btn-primary" value="Submit question" />
        </form>
    </div>
@endsection