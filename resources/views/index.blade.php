@extends('layout.dashboard')

@section('title', 'Feeds')

@section('middle-content')
    @auth()
        @include('feeds.create')
        <hr class="my-3">
    @endauth()
    <div class="">
        @livewire('feed-tabs')
    </div>
@endsection
