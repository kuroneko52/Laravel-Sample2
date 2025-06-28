@extends('layouts.book')

@section('content')
    <div class="container">
        <div class="column">
            <h1>Books List</h1>
            <a href="{{ route('books.create') }}">本を追加</a>
            <div class="button-container-delete">
                <ul>
                    <br><br>
                    @foreach ($books as $book)
                        <li>
                            {{ $book->title }} - {{ $book->author->name }}
                            <a href="{{ route('books.edit', $book) }}" >Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="column">
            <h1>Authors List</h1>
            <a href="{{ route('authors.create') }}">作者を追加</a>
            <br>
            <a href="{{ route('authors.index') }}">作者一覧</a>
            <ul>
            <br>
                @foreach ($authors as $author)
                    <li>{{ $author->name }}</li>
                @endforeach

            </ul>
        </div>
    </div>
@endsection

