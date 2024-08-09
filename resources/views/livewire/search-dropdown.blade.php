<div class="me-5" style="min-width: 400px">
    <form action="{{ route('search.results')}}" method="GET" class="d-flex me-auto">
        <input type="text" name="query" class="form-control me-2" placeholder="Search for feeds or users..." wire:model.debounce.300ms="searchTerm">
        <button class="btn btn-outline-success" type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>  
    @if ($searchTerm)
        <div class="dropdown-menu show">
            <div class="dropdown-header">Feeds</div>
            @foreach($results['feeds'] as $feed)
                <a href="{{ route('feeds.show', $feed->id) }}" class="dropdown-item">
                    {{ $feed->content }}
                </a>
            @endforeach

            <div class="dropdown-divider"></div>

            <div class="dropdown-header">Users</div>
            @foreach($results['users'] as $user)
                <a href="{{ route('users.show', $user->id) }}" class="dropdown-item">
                    {{ $user->username }}
                </a>
            @endforeach
        </div>
    @endif
</div>
