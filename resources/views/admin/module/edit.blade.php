@extends('profile.partials.master-page')

@section('content')
    <x-edit-item-page :$item itemName='Module' updatePath='module.update' />
@endsection
