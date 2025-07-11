@extends('layouts.book')

@section('content')

    <div class="form-container">
        <h1>{{ __('authors.editauthor') }}</h1>
        <form action="{{ route('authors.update', $author) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">{{ __('authors.name') }}</label>
                <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}" required>
            </div>
            <button type="submit" class="btn">{{ __('authors.update') }}</button>
        </form>
        <a href="{{ route('authors.index') }}">{{ __('authors.backtoauthorslist') }}</a>
    </div>

@endsection
