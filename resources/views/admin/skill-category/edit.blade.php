@extends('profile.partials.master-page')

@section('content')
    <x-edit-item-page :$item itemName='SkillCategory' updatePath='skillcategory.update' />
@endsection
