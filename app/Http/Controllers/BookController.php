<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    //show index page
    public function index()
    {
        //use with method to get aturhos data
        $books = Book::with('author')->get();
        $authors = Author::all();

        return view('books.index', compact('books', 'authors'));
    }

    //show create page
    public function create()
    {
        $authors = Author::all();

        return view('books.create', compact('authors'));
    }

    //store book record
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required|exists:authors,id',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book Created Successfully.');
    }

    //show edit page
    public function edit(Book $book)
    {
        $authors = Author::all();

        return view('books.edit', compact('book', 'authors'));
    }

    //update book record
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book Updated Successfully.');
    }

    //destroy book record
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book Deleted Successfully.');
    }

}
