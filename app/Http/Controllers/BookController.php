<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);
        return response()->json($books);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {   
        return response()->json($book);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'author' => 'required|max:50',
            'genre' => 'required|max:50',
            'description' => 'required|max:255',
            // 'image' => 'required|max:255',
            'isbn' => 'required|max:14',
            'published' => 'required',
            'publisher' => 'required|max:255',
        ]);

        $book = Book::create($request->post());
        return response()->json([
            'message'=>'Book Created Successfully!!',
            'book'=>$book
        ]);
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'author' => 'required|max:50',
            'genre' => 'required|max:50',
            'description' => 'required|max:255',
            // 'image' => 'required|max:255',
            'isbn' => 'required|max:14',
            'published' => 'required',
            'publisher' => 'required|max:255',
        ]);
        
        $book->fill($request->post())->save();
        return response()->json([
            'message'=>'Book Updated Successfully!!',
            'book'=>$book
        ]);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'message'=>'Book Deleted Successfully!!'
        ]);
    }
}
