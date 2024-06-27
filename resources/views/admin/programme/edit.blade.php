@extends('profile.partials.master-page')

@section('content')
    <x-edit-item-page :$item itemName='Programme' updatePath='programme.update' />
@endsection
