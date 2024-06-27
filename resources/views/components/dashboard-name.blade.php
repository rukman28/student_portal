<div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">


        @if (Auth::guard('admin')->check())
            {{ __('Admin') }}
        @else
            {{ __('Student') }}
        @endif
    </h2>
</div>
