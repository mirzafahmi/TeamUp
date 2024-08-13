@extends('layout.desktop')

@section('title', $user->name . "'s Profile")

@section('middle-content')

@if (session('is_mobile'))
    @include('users.shared.profile-card-mobile')
@else
    @include('users.shared.profile-card')
@endif

@forelse($feeds as $feed)
    @include('feeds.shared.feed-card', ['showComment' => false])
@empty
    No feeds yet
@endforelse

<div class="mt-3">
    {{ $feeds->withQueryString()->links() }}
</div>
@endsection