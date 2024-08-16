<div class="me-5" style="min-width: @if(session('is_mobile')) 100px @else 400px @endif">
    <form action="{{ route('search.results')}}" method="GET" class="d-flex me-auto">
        <input 
            type="text" 
            name="query" 
            class="form-control me-2" 
            placeholder="Search for feeds or users..." 
            wire:model.live="searchTerm"
            wire:focus="setFocus(true)"
            wire:blur="setFocus(false)"
            >
        <button class="btn btn-outline-success" type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>  
    @if ($searchTerm != ''  && !empty($results))
        <div class="dropdown-menu show bg-light">
            <div class="dropdown-header shadow-sm">Feeds has keyword "{{$searchTerm}}"</div>
            <ul class="list-unstyled">
                @forelse($results['feeds'] as $feed)
                    <li>
                        <a href="{{ route('feeds.show', $feed->id) }}" class="card-link text-decoration-none">
                            @include('search.shared.feed-card-dropdown', ['feed' => $feed])
                        </a>
                    </li>
                @empty
                    <li class="dropdown-item text-primary">No Feeds found</li>
                @endforelse
            </ul>

            <div class="dropdown-divider"></div>

            <div class="dropdown-header shadow-sm">Users named "{{$searchTerm}}"</div>
            <ul class="list-unstyled">
                @forelse($results['users'] as $user)
                    <li>
                        <a href="{{ route('users.show', $user->id) }}" class="card-link text-decoration-none">
                            @include('search.shared.user-card-dropdown', ['user' => $user])
                        </a>
                    </li>
                @empty
                    <li class="dropdown-item text-primary">No notifications</li>
                @endforelse
            </ul>
        </div>
    @endif
</div>
