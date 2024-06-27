@extends('profile.partials.master-page')

@section('content')
    <x-edit-item-page :$item itemName='Practical' updatePath='practical.update' />
@endsection
