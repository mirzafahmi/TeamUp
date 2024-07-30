<div class="dropdown">
    <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-ellipsis-vertical"></i>
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('feeds.show', $feed->id) }}">View</a></li>
        @can('feed-owner', $feed)
            <li><a class="dropdown-item" href="{{ route('feeds.edit', $feed->id) }}">Edit</a></li>
            <li>
                <form method="POST" action="{{ route('feeds.destroy', $feed->id) }}">
                    @csrf
                    @method('delete')
                    <button class="dropdown-item">Delete</button>
                </form>
            </li>
        @endcan
    </ul>
</div>