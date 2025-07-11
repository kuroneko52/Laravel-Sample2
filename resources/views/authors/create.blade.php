@extends('layouts.book')

@section('content')
    <div class="form-container">
        <h1>{{ __('authors.addauthor') }}</h1>
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('authors.name') }}</label>
                <input type="text" name="name" id="name" required>
            </div>
            <button type="submit" class="btn">{{ __('authors.add') }}</button>
        </form>
        <a href="{{ route('authors.index') }}">{{ __('authors.backtoauthorslist') }}</a>
    </div>
@endsection
