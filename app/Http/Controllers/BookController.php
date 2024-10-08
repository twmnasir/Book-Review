<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = $request->input('title');
        $filter = $request->input('filter', ''); // '' -> it mean default value 
       
        $books = Book::when($title, function ($query, $title) {
            return $query->where('title', 'LIKE', '%' . $title . '%');
        });
    
        $books = match ($filter) {
            'popular_last_month' => $books->popularLastMonth(),
            'popular_last_6months' => $books->popularLast6Months(),
            'highest_rated_last_month' => $books->highestRatedLastMonth(),
            'highest_rated_last_6months' => $books->highestRatedLast6Months(),
            default => $books->latest(),
        };
    
        $books = $books->get();
    
        $cacheKey = 'books:' . $filter . ':' . $title;
        $books = cache()->remember($cacheKey, 3600, function () use ($books) {
            // dd('not from cache');
            return $books;
        });
    
        return view('books.index', [
            'books' => $books,
        ]);
    }
    
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $cacheKey = 'books:' . $book->id;
        $book = cache()->remember($cacheKey, 3600, fn () => $book->load([
            'reviews' => fn ($query) => $query->latest()
        ]));
        return view('books.show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
