<div>
    @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-700 hover:text-gray-950 hover:font-bold rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
    @endif
</div>
