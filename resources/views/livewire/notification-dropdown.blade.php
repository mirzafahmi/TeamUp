<div class="dropdown">
    <a
        class="nav-link" 
        type="button" 
        id="dropdownMenuButton" 
        data-bs-toggle="dropdown" 
        aria-expanded="false"
    >
        <i class="fa-solid fa-bell"></i>
        <span class="badge bg-danger">
            {{ $unreadCount }}
        </span>
    </a>
    <ul class="dropdown-menu border-2 bg-light" aria-labelledby="dropdownMenuButton">
        @forelse($notifications as $notification)
            @include('components.notification-card')
        @empty
            <li class="dropdown-item text-primary">No notifications</li>
        @endforelse
    </ul>
</div>