<?php

namespace App\Http\Controllers;

use App\Models\Book; 
use Illuminate\Http\Request; 

class BooksController extends Controller 
{ 
    public function index() 
    { 
        return Book::all(); 
    } 

    public function store(Request $request) 
    { 
        $request->validate([ 
            'title' => 'required|string|max:255', 
            'author' => 'required|string|max:255', 
            'description' => 'required|string', 
            'published_year' => 'required|integer|min:1000|max:' . date('Y'), 
        ]); 

        return Book::create($request->all()); 
    } 

    public function show(Book $book) 
    { 
        return $book; 
    } 

    public function update(Request $request, Book $book) 
    { 
        $request->validate([ 
            'title' => 'string|max:255', 
            'author' => 'string|max:255', 
            'description' => 'string', 
            'published_year' => 'integer|min:1000|max:' . date('Y'), 
        ]); 
        $book->update($request->all()); 

        return $book;
    } 

    public function destroy(Book $book) 
    { 
        $book->delete(); 
        return response()->json(null, 204);
        // is the same as return response()->noContent();
    } 
}
