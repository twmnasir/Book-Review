@extends('layouts.app')
@section('content')
    
  <h1 class="mb-10 text-2xl text-center">Books</h1>


  <form class="">
    <div class="mx-auto mb-6 max-w-80">
        <div class="relative">
          <input
            class="w-full py-2 pl-3 text-sm border-2 rounded-lg"
            placeholder="UI Kits, Dashboards..." 
          />
          <button
            class="absolute top-1 right-1 flex items-center rounded bg-slate-800 py-1 px-2.5 border border-transparent text-center text-sm text-white "
            type="button"
          >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">
              <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
            </svg>
             Search
          </button> 
        </div>
      </div>
  </form>


  <ul class="space-y-3">
    @forelse ($books as $book)
    <li class="p-4 mb-4 bg-white rounded-lg shadow-md" style="border: 1px solid black">
        <div class="book-item">
          <div
            class="flex flex-wrap items-center justify-between">
            <div class="flex-grow w-full sm:w-auto">
              <a href="{{ route('books.show', ['book' => $book]) }}" class="text-lg font-bold underline book-title">{{ $book->title }}</a> <br>
              <span class="text-sm book-author">by {{ $book->author }}</span>
            </div>
            <div>
              <div class="flex">
                <span>{{ number_format($book->reviews_avg_rating, 1) }}</span> <img style="margin-top: -4px" src="{{ asset('assets/img/star5.jpg') }}" width="30px" alt="">
              </div>
              <div class="book-review-count">
                out of {{ $book->reviews_count }} {{ Str::plural('review', $book->reviws_count) }}
              </div>
            </div>
          </div>
        </div>
      </li>
    @empty
    <li class="p-8 mb-4 text-center shadow-md">
        <div class="flex justify-center">
          <p class="mr-5 text-center empty-text">No books found!</p>
          <a href="{{ route('books.index') }}" class="font-bold text-center underline text-md">Reset criteria</a>
        </div>
      </li>
    @endforelse
  </ul>
  
@endsection