@extends('layout.dashboard')

@section('title', 'Feeds')

@section('middle-content')
    @auth()
        @include('feeds.create')
        <hr>
    @endauth()
    <div class="my-3">
        @livewire('feed-tabs')
    </div>
@endsection
