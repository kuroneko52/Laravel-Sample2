@extends('layouts.book')

@section('content')
    <div class="form-container">
        <h1>{{ __('books.addbook') }}</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">{{ __('books.title') }}</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="author_id">{{ __('books.author') }}</label>
                <select name="author_id" id="author_id" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn">{{ __('books.add') }}</button>
        </form>
        <a href="{{ route('books.index') }}">{{ __('books.backtobookslist') }}</a>
    </div>
@endsection
