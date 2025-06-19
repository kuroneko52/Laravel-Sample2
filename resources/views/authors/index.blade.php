@extends('layouts.book')

@section('content')
    <div class="container">
        <div class="column">
            <h1>Authors List</h1>
            <a href="{{ route('authors.create') }}">作者を追加</a>
            <br>
            <a href="{{ route('books.create') }}">本を追加</a>
            <br>
            <a href="{{ route('books.index') }}">本の一覧</a>
            <br><br>
            <div class="button-container-delete">
                <ul>
                    @foreach ($authors as $author)
                        <li>
                            {{ $author->name }}
                            <a href="{{ route('authors.edit', $author) }}">Edit</a>
                            <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </li>
                        <ul>
                            @foreach ($author->books as $book)
                                <li>{{ $book->title }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
