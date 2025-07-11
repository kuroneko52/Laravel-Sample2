@extends('layouts.book')

@section('content')
    <div class="container">
        <div class="column">
            <h1>{{ __('authors.authorslist') }}</h1>
            <a href="{{ route('authors.create') }}">{{ __('authors.addauthorlink') }}</a>
            <br>
            <a href="{{ route('books.create') }}">{{ __('authors.addbooklink') }}</a>
            <br>
            <a href="{{ route('books.index') }}">{{ __('authors.bookslist') }}</a>
            <br><br>
            <div class="button-container-delete">
                <ul>
                    @foreach ($authors as $author)
                        <li>
                            {{ $author->name }}
                            <a href="{{ route('authors.edit', $author) }}">{{ __('authors.edit') }}</a>
                            <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">{{ __('authors.delete') }}</button>
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
