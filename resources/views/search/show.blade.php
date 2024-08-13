@extends('layout.desktop')

@section('title')

@section('middle-content')
    <div class="mb-5">
        <h1>Search result for user named "{{ $query }}"</h1>
        <hr>
        @forelse ($users as $user)
            @if (session('is_mobile'))
                @include('search.shared.user-card-mobile', ['user' => $user])
            @else
                @include('search.shared.user-card', ['user' => $user])
            @endif
        @empty
            <span class="p-1">No user found that named "{{ $query }}"</span>
        @endforelse
        {{ $users->links() }}
    </div>
    <div>
        <h1>Search result for feed has keyword "{{ $query }}"</h1>
        <hr>
        @forelse($feeds as $feed)
            @include('feeds.shared.feed-card', ['showComment' => false])
        @empty
            <span class="p-1">No feeds found that has keyword "{{ $query }}"</span>
        @endforelse
        {{ $feeds->links() }}
    </div>
@endsection