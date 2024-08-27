@php
    $verified = Auth::check() && Auth::user()->hasVerifiedEmail();
@endphp

<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div 
        class="container 
        @if(!$verified)
            d-flex align-items-center justify-content-center
        @endif
    ">
        <a class="navbar-brand fw-light d-flex align-items-center" href="{{ route('index') }}">
            @if($verified)
                <x-application-logo class="tw-fill-current tw-text-white tw-me-2" size="26px" style="height: 100%;"/>
            @endif
            <span>TeamUp</span>
        </a>
        @if($verified)
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @auth()
                        @if (Auth::user()->hasVerifiedEmail())
                            <li class="nav-item">
                                @livewire('search-dropdown')
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                @livewire('notification-dropdown')
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link" href="{{ route('profile') }}"> 
                                    <i class="fa-solid fa-user me-1"></i>
                                    Profile 
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <form action="{{ route('logout') }}" method="POST" class="">
                                    @csrf
                                    <button class="nav-link btn btn-link" type="submit"> 
                                        <i class="fa-solid fa-right-from-bracket me-1"></i>
                                        Logout 
                                    </button>
                                </form>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        @endif
    </div>
</nav>
