
<div class="card mb-5">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between position-relative">
            <div class="d-flex align-items-center">
                <img 
                    style="width:150px" 
                    class="me-3 avatar-sm rounded-circle" 
                    src="{{ $user->getImageURL() }}"
                    alt="Profile Avatar"
                >
                <div id="profile-details">
                    <h3 class="card-title mb-0">
                        {{ $user->name }}
                    </h3>
                    <span class="fs-6 text-muted">
                        &#64;{{ $user->username}} 
                    </span>
                    <span class="fs-6 text-muted">
                        {{ $user->email}} 
                    </span>
                    <div class="mt-3">
                        @include('users.shared.profile-stats', ['modal' => true])
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
        <div class="row px-3">
            <div class="col px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <p class="fs-6 fw-light">
                    {{ $user->bio }}
                </p>
            </div>
        </div>
        <div class="row px-3">
            <div class="col px-2 mt-4 pb-2">
                <h5 class="fs-5"> Prefered Sports : </h5>
                <div class="me-2 d-inline">
                    @forelse($sports as $preferredSport)
                        <span 
                            class="d-inline-block" 
                            tabindex="0" 
                            data-bs-toggle="popover" 
                            data-bs-trigger="hover focus" 
                            data-bs-placement="bottom"
                            data-bs-content="{{ $preferredSport->name }}"
                        >
                            <img 
                                style="width:50px; height: 50px;" 
                                class="avatar-sm rounded-circle" 
                                src="{{ $preferredSport->getImageURL() }}"
                                alt="{{ $preferredSport->name }}"
                            >
                        </span>
                    @empty
                        <span class="fs-6 fw-light">
                            No preferred sports yet
                        </span>
                    @endforelse
                </div>
            </div>
            <div class="col px-2 mt-4 pb-2">
                <h5 class="fs-5">
                    Badges : 
                </h5>
                <div class="me-2 d-inline">
                    @forelse($user->badges as $badge)
                        <span 
                            class="d-inline-block" 
                            tabindex="0" 
                            data-bs-toggle="popover" 
                            data-bs-trigger="hover focus" 
                            data-bs-placement="bottom"
                            data-bs-content="{{ $badge->name }}"
                            >
                                <img 
                                    style="width:50px; height: 50px;" 
                                    class="me-2 avatar-sm rounded-circle" 
                                    src="{{ $badge->getImageURL() }}"
                                    alt="{{ $badge->name }}"
                                >
                        </span>
                        
                    @empty
                        <span class="fs-6 fw-light">
                            No badges yet
                        </span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    @include('users.shared.follower-modal')
    @include('users.shared.following-modal')
</div>
