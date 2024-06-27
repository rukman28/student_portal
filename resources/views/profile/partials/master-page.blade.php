{{-- This has been used as the master page to all the CRUD page layouts --}}

<x-app-layout logoutPath='admin.'>
    <x-slot name="header">
        <x-dashboard-name />


    </x-slot>

    @yield('content')

</x-app-layout>
