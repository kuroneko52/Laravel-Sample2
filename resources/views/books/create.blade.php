@extends('layouts.book')

@section('content')
    <div class="form-container">
        <h1>Add Book</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">タイトル:</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="author_id">作者:</label>
                <select name="author_id" id="author_id" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn">Add</button>
        </form>
        <a href="{{ route('books.index') }}">Back to Books List</a>
    </div>
@endsection
