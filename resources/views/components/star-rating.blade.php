@php
    $fullStars = floor($rating);

    $halfStar = ($rating - $fullStars) >= 0.5;
@endphp

<div class="flex">
    @for ($i = 1; $i <= 5; $i++)
        <span class="{{ $i <= $fullStars ? 'text-yellow-500' : 'text-gray-300' }}">
            {{ $i <= $fullStars ? '★' : '☆' }}
        </span>
    @endfor
</div>
