@extends('layouts.app')
@section('title')
    {{ $book->title }}
@endsection
@section('content')
<div class="container p-6 mx-auto">
    <!-- Book Information -->
    <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
      <h1 class="mb-2 text-3xl text-gray-800"><span class="font-bold">{{ $book->title }}</span></h1>
      <p class="text-lg text-gray-600">by <span class="font-bold">{{ $book->author }}</span></p>
    </div>
  
    <!-- Review Input -->
    <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
      <h2 class="mb-4 text-2xl font-bold text-gray-800">Leave a Review</h2>
      <form action="#" method="POST" class="space-y-4">
        <textarea name="review" rows="2" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" placeholder="Write your review here..."></textarea>
        <div>
          <button type="submit" class="px-6 py-2 text-white transition bg-black rounded-lg hover:bg-slate-700">Submit Review</button>
        </div>
      </form>
    </div>
  
    <!-- All Reviews -->
    <div class="p-6 bg-white rounded-lg shadow-md">
      <h2 class="mb-4 text-xl text-gray-800">Total <span class="font-bold">{{ $book->reviews_count }}</span> {{ Str::plural('review', 5) }} have been provided</h2>
  
      <!-- Each Review -->
      <div class="space-y-4">
        @forelse ($book->reviews as $review)
        <div class="p-4 border rounded-lg bg-gray-50">
            <div class="flex items-center justify-between mb-2">
              <div class="text-gray-800">
                <span class="text-sm text-gray-500">- Reviewed on {{ $review->created_at->format('M j, Y') }}</span>
              </div>
              <div class="flex items-center">
                <span class="mr-2 font-medium text-gray-700">Rating:</span>
                <span class="font-bold">{{ $review->rating }}</span>
              </div>
            </div>
            <p class="text-gray-800">
                {{ $review->review }}
            </p>
          </div>
        @empty
        <div class="p-6 text-center border rounded-lg bg-gray-50">
            <!-- Icon -->
            <div class="mb-4 text-gray-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 4H7m9 4H8a2 2 0 01-2-2V8a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 01-2 2z" />
              </svg>
            </div>
            <h2 class="mb-2 text-2xl font-semibold text-gray-800">No Reviews Available</h2>
            <p class="mb-6 text-gray-600">There are no reviews for this book yet. Be the first to leave a review!</p>
            <a href="{{ route('books.index') }}" class="inline-block px-4 py-2 text-white transition bg-black rounded-lg hover:bg-slate-700">
              <i class="mr-2 fas fa-arrow-left"></i> Go Back
            </a>
        </div>
        @endforelse 
      </div>
    </div>
  </div>
  
  <!-- Tailwind CSS CDN for quick prototyping -->
  <script src="https://cdn.tailwindcss.com"></script>
  
@endsection