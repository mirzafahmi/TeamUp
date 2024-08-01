@extends('layout.profile')

@section('title', $user->name . "'s Profile")

@section('middle-content')

@include('users.shared.profile_card')

@forelse($feeds as $feed)
    @include('feeds.shared.feed-card', ['showComment' => false])
@empty
    No feeds yet
@endforelse

@endsection