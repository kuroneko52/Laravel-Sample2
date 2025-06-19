@extends('layouts.book')

@section('content')

    <div class="form-container">
        <h1>Edit Author</h1>
        <form action="{{ route('authors.update', $author) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}" required>
            </div>
            <button type="submit" class="btn">Update</button>
        </form>
        <a href="{{ route('authors.index') }}">Back to Authors List</a>
    </div>

@endsection
