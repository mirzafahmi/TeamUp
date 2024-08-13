<div class="mb-3">
    <div class="p-3">
        <div class="d-flex align-items-center justify-content-between position-relative">
            <div class="d-flex align-items-center">
                <img 
                    style="width:75px" 
                    class="me-3 avatar-sm rounded-circle" 
                    src="{{ $feed->user->getImageURL() }}"
                    alt="Profile Avatar"
                >
                <div id="profile-details">
                    <h4 class="card-title mb-0">
                        <a href="{{ route('users.show', $feed->user->id)}}">
                            {{ $feed->user->name }}
                        </a>
                    </h4>
                    <span class="fs-6 text-muted">
                        &#64;{{ $feed->user->username}} 
                    </span>
                    <span class="fs-6 text-muted">
                        {{ $feed->user->email}} 
                    </span>
                </div>
            </div>
            <div class="position-absolute top-0 end-0">
                @can('profile-owner', $feed->user)

                @else
                    @auth()
                        <livewire:follower-buttons :user="$feed->user" />
                    @endauth
                @endcan
            </div>
        </div>
        <div>
            <span>Sport Name</span>
            {{ $feed->sport->name }}
            <span>Play Level</span>
            {{ $feed->playLevel->name }}
            <span>Play Mode</span>
            {{ $feed->playMode->name }}
            <span>Play Role</span>
            <span>Spot Availability</span>
        </div>
    </div>
</div>