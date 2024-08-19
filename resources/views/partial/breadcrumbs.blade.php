<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ Route::is('index') ? 'text-white bg-dark rounded' : '' }} nav-link"
                    href="{{ route('index') }}">
                    <span>Home</span></a>
            </li>
            @can('admin-access')
            <li class="nav-item">
                <a class="{{ Route::is('admin') ? 'text-white bg-dark rounded' : '' }} nav-link"
                    href="{{ url('/admin') }}">
                    <span>Admin Dashboard</span>
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a class="{{ Route::is('sports.index') ? 'text-white bg-dark rounded' : '' }} nav-link"
                    href="{{ route('sports.index') }}">
                    <span>Sports</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('community.index') ? 'text-white bg-dark rounded' : '' }} nav-link"
                    href="{{ route('community.index') }}">
                    <span>Community</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('about.index') ? 'text-white bg-dark rounded' : '' }} nav-link"
                    href="{{ route('about.index') }}">
                    <span>About</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('terms.index') ? 'text-white bg-dark rounded' : '' }} nav-link"
                    href="{{ route('terms.index') }}">
                    <span>Terms</span>
                </a>
            </li>
        </ul>
    </div>
</div>