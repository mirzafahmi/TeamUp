<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
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
                        @include('user.shared.profile_stats')
                    </div>
                </div>
            </div>
            <div class="pe-3">
                <a href="{{ route('users.edit', $user->id) }}">
                    <i class="fa-solid fa-gear"></i>
                    Edit
                </a>
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
            <div class="col px-2 mt-4">
                <h5 class="fs-5"> Prefered Games : </h5>
                <p class="fs-6 fw-light">
                    {{ $user->bio }}
                </p>
            </div>
            <div class="col px-2 mt-4">
                <h5 class="fs-5"> Badges : </h5>
                <p class="fs-6 fw-light">
                    {{ $user->bio }}
                </p>
            </div>
        </div>
    </div>
</div>