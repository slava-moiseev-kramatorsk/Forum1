<?php

namespace App\Http\Controllers;

use App\Http\Requests\BooksRequest;
use App\Http\Resources\BooksCollection;
use App\Http\Resources\BooksResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return BooksResource::collection(Book::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BooksRequest $request)
    {
        $validatedRequest = $request -> validated();
        Book::create($validatedRequest);
//        $book = new Book();
//        $book->title = $request->only('title');
//        $book->author = $request->input('author');
//        $book->page = $request->input('page');
//        $book->price = $request->input('price');
//        $book->genre = $request->input('genre');
//        $book->description = $request->input('description');
//
//        $book['image'] = $request->file('image')->store('public');
//        $book->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Book $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return JsonResponse
     */
    public function update($id, BooksRequest $request): JsonResponse
    {
        dd($id, $request);
        $data = $request->validated();
        $book = Book::find($id);
        $book->update($data);


        return response()->json(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $books, $id)
    {
        $book = Book::find($id);
        $book->delete();
    }
}
