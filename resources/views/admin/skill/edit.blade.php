@extends('profile.partials.master-page')

@section('content')
    <x-edit-item-page :$item itemName='Skill' updatePath='skill.update' />
@endsection
