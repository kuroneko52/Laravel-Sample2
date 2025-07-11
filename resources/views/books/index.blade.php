@extends('layouts.book')

@section('content')
    <div class="container">
        <div class="column">
            <h1>{{ __('books.bookslist') }}</h1>
            <a href="{{ route('books.create') }}">{{ __('books.addbooklink') }}</a>
            <div class="button-container-delete">
                <ul>
                    <br><br>
                    @foreach ($books as $book)
                        <li>
                            {{ $book->title }} - {{ $book->author->name }}
                            <a href="{{ route('books.edit', $book) }}" >{{ __('books.edit') }}</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">{{ __('books.delete') }}</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="column">
            <h1>{{ __('books.authorslist') }}</h1>
            <a href="{{ route('authors.create') }}">{{ __('books.addauthorlink') }}</a>
            <br>
            <a href="{{ route('authors.index') }}">{{ __('books.authorslist') }}</a>
            <ul>
            <br>
                @foreach ($authors as $author)
                    <li>{{ $author->name }}</li>
                @endforeach

            </ul>
        </div>
        
        <div class='column'>
            <h3>
                {{ __('books.add') }}
                <a href="{{ route('set.locale', ['locale' => 'ja']) }}">日本語</a>
                <a href="{{ route('set.locale', ['locale' => 'en']) }}">English</a>
            </h3>
        </div>


    </div>
@endsection

