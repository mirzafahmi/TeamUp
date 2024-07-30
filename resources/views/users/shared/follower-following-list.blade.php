<div class="card mb-3">
    <div class="card-body d-flex align-items-center justify-content-between">
        <div class="d-flex">
            <img 
                src="{{ $intendedUser->getImageURL() }}" 
                alt="Profile Avatar" 
                class="me-3 avatar-sm rounded-circle" 
                style="width:50px; height:50px;"
            >
            <div>
                <h5 class="mb-0">
                    <a href="{{ route('users.show', $intendedUser->id) }}">
                        {{ $intendedUser->name }}
                    </a>
                </h5>
                <p class="mb-0 text-muted">&#64;{{ $intendedUser->username }}</p>
                <p class="mb-0 text-muted">{{ $intendedUser->email }}</p>
            </div>
        </div>
        <div class="">
            @can('profile-owner', $intendedUser)
                
            @else
                @auth()
                    <livewire:follower-buttons :user="$intendedUser" />
                @endauth
            @endcan
        </div>
    </div>
</div>