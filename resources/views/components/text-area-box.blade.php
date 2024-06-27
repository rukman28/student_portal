@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} rows="4" cols="50"
    {{ $attributes->merge([
        'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
    ]) }}>{{ $slot }}</textarea>
