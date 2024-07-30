<div class="card my-3">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img 
                    style="width:50px" 
                    class="me-2 avatar-sm rounded-circle" 
                    src="{{ $feed->user->getImageURL() }}"
                    alt="{{ $feed->user->name }}"
                >
                <div>
                    <h5 class="mb-0 card-title">
                        <a href="{{ route('users.show', $feed->user->id) }}">
                            {{ $feed->user->name }}
                        </a>
                    </h5>
                    <span class="fs-6 text-muted">
                        &#64;{{ $feed->user->username }} 
                    </span>
                </div>
            </div>
            @include('components.settings-dropdown')
        </div>
        <hr class="">
        <div class="mt-3">
            <p>{{ $feed->content }}</p>
            <hr>
            <span class="">Details</span>
            <div class="row mt-3">
                <div class="col mb-2">
                    <span class="d-block">Sports Name</span>
                    <span>{{ $feed->sport->name }}</span>
                </div>
                <div class="col mb-2">
                    <span class="d-block">Play Levels</span>
                    <span>{{ $feed->playLevel->name }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <span class="d-block">Play Modes</span>
                    <span>{{ $feed->playMode->name  }}</span>
                </div>
                <div class="col mb-2">
                    <span class="d-block">Play Roles</span>
                    <span>{{ $feed->playRole->name  }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <span class="d-block">Event Date</span>
                    <span>{{ $feed->event_date  }}</span>
                </div>
                <div class="col mb-2">
                    <span class="d-block">Spot Availability</span>
                    <span>{{ $feed->spot_availability  }}</span>
                </div>
            </div>
            <div class="row">
                <span>Current Team</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <span class="fs-6 fw-light text-muted"> 
                    <span class="d-block">Posted</span>
                    <span class="fas fa-clock"> </span>
                    {{ $feed->created_at->diffForHumans() }}
                </span>
            </div>
        </div>
    </div>
</div>