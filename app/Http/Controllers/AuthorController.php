<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class AuthorController extends Controller
{
    //show index page
    public function index()
    {
        //use with method to get books data
        $authors = Author::with('books')->get();
        $books = Book::all();

        return view('authors.index', compact('authors', 'books'));
    }

    //show create page
    public function create()
    {
        return view('authors.create');
    }

    //store author record
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Author::create($request->all());

        return redirect()->route('authors.index')->with('success', 'Author Created Successfully.');

    }

    //show edit page
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    //update author record
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index')->with('success', 'Author Updated Successfully.');
    }

    //delete author record
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author Deleted Successfully.');
    }
}
