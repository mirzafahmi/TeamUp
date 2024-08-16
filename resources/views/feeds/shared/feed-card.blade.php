<div class="card mb-3">
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
            @include('components.feeds-settings-dropdown')
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
                    <span class="d-block">Current Team</span>
                    <div class="">
                        @foreach ($feed->comments->filter(function($comment) {
                                return $comment->request_to_join && $comment->joinStatus->name === 'Approved';
                            }) as $comment)
                                <span 
                                    class="d-inline-block" 
                                    tabindex="0" 
                                    data-bs-toggle="popover" 
                                    data-bs-trigger="hover focus" 
                                    data-bs-placement="bottom"
                                    data-bs-content="&#64;{{ $comment->user->username }}"
                                >   
                                    <a href="{{ route('users.show', $comment->user->id) }}">
                                        <img style="width:30px" class="avatar-sm rounded-circle"
                                            src="{{ $comment->user->getImageURL()}}" 
                                            alt="{{ $comment->user->username }}"
                                        >
                                    </a>
                                </span>
                        @endforeach
                    </div>
                </div>
            </div>
            @foreach ( $feed->playRoles as $role)
            <div class="row">
                <div class="col mb-2">
                    <span class="d-block">Play Roles</span>
                    <span>{{ $role->name }}</span>
                </div>
                <div class="col mb-2">
                    <span class="d-block">Spot Availability</span>
                    <span>{{ $role->pivot->spot_availability }}</span>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col mb-2">
                    <span class="d-block">Event Date</span>
                    <span>{{ $feed->event_date->format('M j, Y \a\t g:i A') }}</span>
                </div>
                
                <div class="col mb-2">
                    <span class="d-block">Event Location</span>
                    <span 
                        class="d-inline-block" 
                        tabindex="0" 
                        data-bs-toggle="popover" 
                        data-bs-trigger="hover focus" 
                        data-bs-placement="bottom"
                        data-bs-content="View in Google Map"
                    > 
                        <a href="{{ $feed->eventLocation->map_link}}" class="p-1" target="_blank">
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </span>
                    <span 
                        class="d-inline-block" 
                        tabindex="0" 
                        data-bs-toggle="popover" 
                        data-bs-trigger="hover focus" 
                        data-bs-placement="bottom"
                        data-bs-content="View Details"
                    > 
                        <a href="{{ route('event-locations.show', $feed->eventLocation->id) }}">
                            {{$feed->eventLocation->name}}
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex ">
            <div>
                <span class="fs-6 fw-light text-muted"> 
                    <span class="d-block">Posted</span>
                    <span class="fas fa-clock"> </span>
                    {{ $feed->created_at->diffForHumans() }}
                </span>
            </div>
            <div class="ms-5">
                <span class="fs-6 fw-light text-muted"> 
                    <span class="d-block mb-1">Comments</span>
                    <a class="dropdown-item" href="{{ route('feeds.show', $feed->id) }}">
                        <span class="fas fa-comment"> </span>
                        {{ $feed->comments()->count() }}
                    </a>
                </span>
            </div>
        </div>
    </div>
    @if($showComment)
        <hr>
        @include('comments.show', ['comments' => $feed->comments])
    @endif
    
</div>