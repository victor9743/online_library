<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'category'])->paginate(10);
        return view('books.index', data: compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        $statuses = Book::statuses();
        return view('books.create', compact('authors','categories','statuses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'value' => 'required',
            'status' => 'required|in:'.implode(',', array_keys(Book::statuses())),
        ]);

        // replacing value to proper decimal format before saving
        $data['value'] = str_replace(['.', ','], ['', '.'], $data['value']);

        Book::create($data);
        return redirect()->route('books.index')->with('success',value: 'Book successfully created.');
    }

    public function show(Book $book)
    {
        $book->load(['author','category']);
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        $statuses = Book::statuses();
        return view('books.edit', compact('book','authors','categories','statuses'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'value' => 'required|numeric|min:0',
            'status' => 'required|in:'.implode(',', array_keys(Book::statuses())),
        ]);

        $book->update($data);
        return redirect()->route('books.index')->with('success','Book successfully updated.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success','Livro successfully deleted.');
    }
}
