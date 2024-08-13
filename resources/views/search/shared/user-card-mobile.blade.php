<div class="card mb-3">
    <div class="p-3">
        <div class="d-flex align-items-center justify-content-between position-relative">
            <div class="d-flex align-items-center">
                <img 
                    style="width:75px" 
                    class="me-3 avatar-sm rounded-circle" 
                    src="{{ $user->getImageURL() }}"
                    alt="Profile Avatar"
                >
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
        <div id="profile-details" class="mt-2">
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
        </div>
        <div class="mt-3">
            @include('users.shared.profile-stats', ['followers' => $user->followers(), 'followings' => $user->followings()])
        </div>
        <div class="mt-4">
            <h6 class="fs-6"> Prefered Sports : </h6>

            <div class="me-2 d-inline px-1">
                @forelse($user->preferredSports as $preferredSport)
                    <span 
                        class="d-inline-block pe-1" 
                        tabindex="0" 
                        data-bs-toggle="popover" 
                        data-bs-trigger="hover focus" 
                        data-bs-placement="bottom"
                        data-bs-content="{{ $preferredSport->name }}"
                    >
                        <img 
                            style="width:30px; height: 30px;" 
                            class="avatar-sm rounded-circle" 
                            src="{{ $preferredSport->getImageURL() }}"
                            alt="{{ $preferredSport->name }}"
                        >
                    </span>
                @empty
                    <span class="fs-6 text-muted p-2">No preferred sports yet</span>
                @endforelse
            </div>
        </div>
        <x-rounded-circle-display 
            title="Mutual Followers"
            :details="$user->mutualFollowers->take(3)"    
            routeName="users.show"
            emptyTitle="No mutual followers found"
            :count="$user->mutualFollowers->count()"
            modal="true"
            modalName="mutualFollowers"
            :user="$user"
        />
        <x-rounded-circle-display 
            title="Mutual Followings"
            :details="$user->mutualFollowings->take(3)"
            routeName="users.show"
            emptyTitle="No mutual followings found"
            :count="$user->mutualFollowings->count()"
            modal="true"
            modalName="mutualFollowings"
            :user="$user"
        />
    </div>
    @include('users.shared.follower-modal', ['user' => $user, 'followers' => $user->followers])
    @include('users.shared.following-modal', ['user' => $user, 'followings' => $user->followings])
    @include('users.shared.mutual-following-modal', ['user' => $user])
</div>