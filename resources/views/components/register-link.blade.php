@if ($registerPath)
    <div>
        <a class=" text-blue-950 text-sm hover:font-bold" href="{{ route($registerPath . '.register') }}">Register</a>
    </div>
@else
    <div>
        <a class=" text-blue-950 text-sm hover:font-bold" href="{{ route('register') }}">Register</a>
    </div>
@endif
