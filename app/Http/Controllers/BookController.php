<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookQuery = Book::query();
        $this->searchBooks($bookQuery, $request->search);

        $books = BookResource::collection(
            $bookQuery->paginate(10)
        );
        return inertia('Books/Index',[
            'books'=>$books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \inertia("Books/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {

        $validated = $request->validated();
        Book::create($validated);
        return redirect()->route("books.index")->with('success', 'Book saved.');;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return \inertia("Books/Show",[
            'book'=> $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return \inertia("Books/Edit",[
            'book'=> BookResource::make($book)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());

        return redirect()->route('books.index')->with('success', 'Your changes were saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book  $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Action successful!');
    }

    protected function searchBooks(Builder $query, $search)
    {
        return $query->when($search, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('status', 'like', '%' . $search . '%');
        });
    }
}
