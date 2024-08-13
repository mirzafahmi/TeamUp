@props([
    'modal' => false
])

<div class="d-flex justify-content-start">
    @if ($modal)
        <a href="#" class="fw-light nav-link fs-6 me-2" data-bs-toggle="modal" data-bs-target="#followerModal{{$user->id}}"> 
            {{ $followers->count() }} followers 
        </a>
        <a href="#" class="fw-light nav-link fs-6 me-3 " data-bs-toggle="modal" data-bs-target="#followingModal{{$user->id}}"> 
            {{ $followings->count() }} followings 
        </a>
        <a href="#" class="fw-light nav-link fs-6 me-3"> 
            <span class="fas fa-vr-cardboard me-1"></span> 
            {{ $user->feeds->count() }} Feeds
        </a>
        <a href="#" class="fw-light nav-link fs-6 me-3"> 
            <span class="fas fa-thumbs-up me-1"></span> 
            Commendations
        </a>
    @else
        <span class="fw-light nav-link fs-6 me-2" data-bs-toggle="modal" data-bs-target="#followerModal{{$user->id}}"> 
            {{ $followers->count() }} followers 
        </span>
        <span class="fw-light nav-link fs-6 me-3 " data-bs-toggle="modal" data-bs-target="#followingModal{{$user->id}}"> 
            {{ $followings->count() }} followings 
        </span>
        <span class="fw-light nav-link fs-6 me-3"> 
            <span class="fas fa-vr-cardboard me-1"></span> 
            {{ $user->feeds->count() }} Feeds
        </span>
        <span class="fw-light nav-link fs-6 me-3"> 
            <span class="fas fa-thumbs-up me-1"></span> 
            Commendations
        </span>
    @endif
</div>
