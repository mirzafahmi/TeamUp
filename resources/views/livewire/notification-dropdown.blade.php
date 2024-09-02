<div class="dropdown">
    <a
        class="nav-link position-relative" 
        type="button" 
        id="dropdownMenuButton" 
        data-bs-toggle="dropdown" 
        aria-expanded="false"
    >
        <i class="fa-solid fa-bell"></i>
        @if (session('is_mobile'))
            Notification
        @else
            <span class="position-absolute translate-middle badge rounded-pill bg-danger"
                style="left:90%;">
                {{ $unreadCount }}
            </span>
        @endif
    </a>
    <ul class="dropdown-menu border-2 bg-light" style="min-width:300px;" aria-labelledby="dropdownMenuButton">
        @forelse($notifications->take(7) as $notification)
            @include('components.notification-card')
        @empty
            <li class="dropdown-item text-primary">No notifications</li>
        @endforelse
        <div class="d-flex align-center justify-content-center mt-3" style="border-top: 1px solid rgba(118, 118, 118, 1);">
            <a class="pt-2" href="{{ route('notification.index')}}">View All</a>
        </div>
    </ul>
</div>