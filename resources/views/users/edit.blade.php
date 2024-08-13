@extends('layout.base')

@section('content')

@if (session('is_mobile'))
    @include('users.shared.profile-card-edit-mobile')
@else
    @include('users.shared.profile-card-edit')
@endif


@endsection