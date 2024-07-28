@extends('layout.dashboard')

@section('middle-content')
    @auth()
        @include('feeds.create')
        <hr>
    @endauth()
    <div class="my-3">
        @foreach($feeds as $feed)
            @include('feeds.shared.feed-card')
        @endforeach 
    </div>
    <div class="mt-3">
        {{ $feeds->withQueryString()->links() }}
    </div>
@endsection
