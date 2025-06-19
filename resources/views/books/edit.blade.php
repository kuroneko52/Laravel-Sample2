@extends('layouts.book')

@section('content')
    <div class="form-container">
        <h1>Edit Book</h1>
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">タイトル:</label>
                <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required>
            </div>

            <div class="form-group">
                <label for="author_id">作者:</label>
                <select name="author_id" id="author_id" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn">Update</button>
        </form>
        <a href="{{ route('books.index') }}">Back to Books List</a>
    </div>

@endsection
