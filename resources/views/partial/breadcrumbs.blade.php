<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ Route::is('index') ? 'text-white bg-primary rounded' : '' }} nav-link"
                    href="{{ route('index') }}">
                    <span>Home</span></a>
            </li>
            @can('admin-access')
            <li class="nav-item">
                <a class="{{ Route::is('admin.index') ? 'text-white bg-primary rounded' : '' }} nav-link"
                    href="{{ route('admin.index') }}">
                    <span>Admin Dashboard</span>
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link"
                    href="">
                    <span>Sports</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    href="">
                    <span>Community</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    href="">
                    <span>About</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    href="">
                    <span>Terms</span>
                </a>
            </li>
        </ul>
    </div>
</div>