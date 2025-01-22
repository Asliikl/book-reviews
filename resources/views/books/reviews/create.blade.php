@extends('layout.app')

@section('content')
    <a href="{{ route('books.show', $book) }}" class="px-4 py-2 text-sm bg-red-300 text-white font-semibold rounded-md hover:bg-red-500 transition duration-150 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
        Cancel
    </a>

    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-8">
        <h1 class="mb-6 text-xl font-semibold text-center text-gray-800">Add Review for {{ $book->title }}</h1>

        <form method="POST" action="{{ route('books.reviews.store', $book) }}">
            @csrf

            <div class="mb-4">
                <label for="review" class="block text-sm font-medium text-gray-700 mb-2">Your Review</label>
                <textarea name="review" id="review" required class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-150" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                <div class="flex items-center space-x-2" id="rating-container">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="star text-3xl cursor-pointer text-gray-400" data-value="{{ $i }}">&#9733;</span>
                    @endfor
                </div>
                <input type="hidden" name="rating" id="rating" value="">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="px-6 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                    Add Review
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('rating');

            let currentRating = 0;

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const value = this.getAttribute('data-value');
                    ratingInput.value = value;
                    updateStars(value);
                });
            });

            function updateStars(rating) {
                stars.forEach(star => {
                    const starValue = star.getAttribute('data-value');
                    if (starValue <= rating) {
                        star.innerHTML = '&#9733;';
                        star.classList.add('text-yellow-500');
                        star.classList.remove('text-gray-400');
                    } else {
                        star.innerHTML = '&#9734;';
                        star.classList.remove('text-yellow-500');
                        star.classList.add('text-gray-400');
                    }
                });
            }

            currentRating = 0;
            updateStars(currentRating);
        });
    </script>
@endsection
