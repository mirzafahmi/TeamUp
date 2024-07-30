@extends('layout.profile')

@section('middle-content')

@include('users.shared.profile_card')

@forelse($feeds as $feed)
    @include('feeds.shared.feed-card')
@empty
    No feeds yet
@endforelse

@endsection