<div class="shadow-sm">
    <div class="d-flex align-items-center justify-content-between position-relative card-body p-3">
        <div class="d-flex">
            <img 
                style="width:60px; height:60px;" 
                class="me-3 avatar-sm rounded-circle" 
                src="{{ $user->getImageURL() }}"
                alt="Profile Avatar"
            >
            <div id="profile-details">
                <h4 class="card-title mb-0">
                    {{ $user->name }}
                </h4>
                <span class="fs-6">
                    &#64;{{ $user->username}} 
                </span>
                <span class="fs-6">
                    {{ $user->email}} 
                </span>
                <div class="mt-2 d-flex justify-content-start">
                    <span class="fs-6 me-2"> 
                        {{$user->followers->count()}} followers
                    </span>
                    <span class="fs-6 me-2"> 
                        {{$user->followings->count()}} followings
                    </span>
                </div>
            </div>
        </div>
        <div class="position-absolute top-10 end-0 me-3">
            @can('profile-owner', $user)

            @else
                @auth()
                    <livewire:follower-buttons 
                        :user="$user" 
                        :key="'follower-buttons-user-card-' . $user->id"
                    />
                @endauth
            @endcan
        </div>
    </div>
</div>