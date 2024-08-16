<div class="shadow-sm" style="max-width:600px;">
    <div class="card-body p-3">
        <div class="d-flex align-items-center mb-3">
            <img 
                style="width:60px; height:60px;" 
                class="me-3 avatar-sm rounded-circle border" 
                src="{{ $feed->user->getImageURL() }}"
                alt="Profile Avatar"
            >
            <div>
                <h5 class="card-title mb-1">
                    {{ $feed->user->name }}
                </h5>
                <p class="mb-0  fs-6">
                    &#64;{{ $feed->user->username}}
                </p>
            </div>
        </div>
        <div class="mb-2">
            <span class="badge bg-info me-2">{{ $feed->sport->name }}</span>
            <span class="badge bg-warning me-2">{{ $feed->playLevel->name }}</span>
            <span class="badge bg-success me-2">{{ $feed->playMode->name }}</span>
            @foreach ($feed->playRoles as $playRole)
                <span class="badge bg-dark me-2">
                    {{ $playRole->name }}: {{ $playRole->pivot->spot_availability}}
                </span>
            @endforeach
        </div>
        <div class="fs-6">
            <i class="fa-solid fa-comment me-1"></i>
            <span class="text-wrap">{{ $feed->content }}</span>
        </div>
        <div class=" fs-6">
            <div>
                <i class="fa-solid fa-location-dot me-1"></i>
                {{ $feed->eventLocation->name }}
            </div>
            <div>
                <i class="fa-solid fa-calendar me-1"></i>
                {{ $feed->event_date->format('M j, Y \a\t g:i A') }}
            </div>
        </div>
    </div>
</div>
