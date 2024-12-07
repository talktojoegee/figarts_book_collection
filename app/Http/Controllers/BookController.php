<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $books = BookResource::collection(Book::findAllBooks());
        return inertia('Books/index',[
            'books'=>$books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \inertia("Books/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {

        $validated = $request->validated();
        Book::create($validated);
        return redirect()->route("books.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return \inertia("Books/edit",[
            'book'=> BookResource::make($book)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return redirect()->route("books.index");
        //return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book  $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Action successful!');
    }
}
