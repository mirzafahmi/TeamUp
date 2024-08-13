<div class="mb-3">
    <div class="p-3">
        <div class="d-flex align-items-center justify-content-between position-relative">
            <div class="d-flex align-items-center">
                <img 
                    style="width:75px" 
                    class="me-3 avatar-sm rounded-circle" 
                    src="{{ $user->getImageURL() }}"
                    alt="Profile Avatar"
                >
                <div id="profile-details">
                    <h4 class="card-title mb-0">
                        <a href="{{ route('users.show', $user->id)}}">
                            {{ $user->name }}
                        </a>
                    </h4>
                    <span class="fs-6 text-muted">
                        &#64;{{ $user->username}} 
                    </span>
                    <span class="fs-6 text-muted">
                        {{ $user->email}} 
                    </span>
                    <div class="mt-3">
                        @include('users.shared.profile-stats', ['followers' => $user->followers(), 'followings' => $user->followings()])
                    </div>
                </div>
            </div>
            <div class="position-absolute top-0 end-0">
                @can('profile-owner', $user)
                    <a href="{{ route('users.edit', $user->id) }}">
                        <i class="fa-solid fa-gear"></i>
                        Edit
                    </a>
                @else
                    @auth()
                        <livewire:follower-buttons :user="$user" />
                    @endauth
                @endcan
            </div>
        </div>
    </div>
</div>