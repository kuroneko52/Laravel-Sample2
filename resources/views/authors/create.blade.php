@extends('layouts.book')

@section('content')
    <div class="form-container">
        <h1>Add Author</h1>
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">名前:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <button type="submit" class="btn">Add</button>
        </form>
        <a href="{{ route('authors.index') }}">Back to Authors List</a>
    </div>
@endsection
