@extends('layouts.app')

@section('title')
Book Reviews
@endsection

@section('content')

  <h3 class="text-3xl font-bold text-center ">Books</h3>  

  <form action="{{ route('books.index') }}" method="GET" class="flex mx-auto mt-5" style="max-width: 800px">
    
    <input class="flex-1 px-3 py-2 border border-gray-300 rounded-md form-input me-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
      type="search" name="title" value="{{ request('title') }}"
      placeholder="Search books by title..." aria-label="Search"/>
      
    <input type="hidden" name="filter" value="{{ request('filter') }}">
    
    <button class="px-4 py-2 text-white bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" 
      type="submit"><i class="fa-solid fa-magnifying-glass"></i> </button>

    <a href="{{ route('books.index') }}" class="px-4 py-2 text-white bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 ms-1">
      <i class="fa-solid fa-xmark"></i> </a>
      
  </form>

  <div class="h-6 mx-auto mt-4 bg-white rounded-lg shadow-md" style="max-width: 1000px">
    @php
      $filters = [
        '' => 'latest',
        'popular_last_month' => 'Popular last month',
        'popular_last_6months' => 'Popular last 6 months',
        'highest_rated_last_month' => 'Highest rated last month',
        'highest_rated_last_6months' => 'Highest rated last 6 months'
      ];
    @endphp
    <!-- Only one ul for the tabs -->
    <ul class="flex justify-center mb-4 space-x-2 border-b border-gray-200">
      @foreach ($filters as $key => $label)
        <li>
          <a class="px-4 py-2 text-sm font-bold {{ request('filter') === $key || (request('filter') === null && $key === '') ? 'text-black border-b-2 border-black' : 'text-gray-600' }}" 
            href="{{ route('books.index', [...request()->query(), 'filter' => $key]) }}">{{ $label }}</a>
        </li>
      @endforeach
    </ul>
  </div>
  
  <ol class="mx-auto mb-5 bg-white rounded-lg shadow-md list-group" style="max-width: 1000px">
    @forelse ($books as $book)
      <li class="flex items-center justify-between p-4 border-b border-gray-200">
        <div class="flex-1">
          <div class="text-lg font-semibold text-blue-600 underline"><a href="{{ route('books.show', ['book' => $book]) }}" class="text-gray-800">{{ $book->title }}</a></div>
          <div class="text-gray-600">{{ $book->author }}</div>
        </div>
        <div class="flex flex-col items-end">
          <span class="text-sm font-bold">
            {{ number_format($book->reviews_avg_rating, 1) }} ratings
          </span>
          <span class="text-sm"> of <span class="font-bold">{{ $book->reviews_count }}</span> {{ Str::plural("review", $book->reviews_count) }}</span>
        </div>
      </li>
    @empty
      <div class="flex justify-center p-4 bg-white border-b border-gray-200 h-72">
        <div class="mt-10 text-center">
          <!-- FontAwesome search icon -->
          <i class="mb-4 text-2xl text-gray-500 fas fa-search"></i>
          <h1 class="mb-4 text-2xl font-bold text-gray-800">No Results Found</h1>
          <p class="mb-6 text-lg text-gray-600">System couldn’t find any books matching your search.</p>
          <a href="{{ route('books.index') }}" class="px-4 py-2 text-white transition bg-black rounded hover:bg-slate-700">
            <i class="mr-2 fas fa-arrow-left"></i> Go Back
          </a>
        </div>
      </div>
    @endforelse
  </ol>

@endsection
