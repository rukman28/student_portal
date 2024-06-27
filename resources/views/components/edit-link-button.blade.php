<div>
    <a href="{{ route($editRoute . '.edit', $item) }}"
        {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-green-700 hover:bg-green-800 text-white text-sm font-medium rounded-md']) }}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
        </svg>
        @if ($slot->isEmpty())
            Edit
        @else
            {{ $slot }}
        @endif
    </a>
</div>
