@extends('layout.desktop')

@section('title', 'Notification')

@section('middle-content')
    <h1>All notifications</h1>
    <hr>
    @forelse($notifications as $notification)
        <div class="">
            @include('components.notification-card')
            <hr>
        </div>
    @empty
        <li class="dropdown-item text-primary">No notifications</li>
    @endforelse
@endsection
