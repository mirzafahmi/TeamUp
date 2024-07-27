<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $feed->user->getImageURL() }}"
                    alt="{{ $feed->user->name }}">
                <div>
                    <h5 class="mb-0 card-title"><a href="{{ route('users.show', $feed->user->id) }}">
                            {{ $feed->user->name }}
                        </a></h5>
                </div>
            </div>
            <div class="d-flex">
                <a href="{{ route('feeds.show', $feed->id) }}"> View </a>
                @auth()
                    @can('update', $feed)
                        <a class="mx-2" href="{{ route('feeds.edit', $feed->id) }}"> Edit </a>
                        <form method="POST" action="{{ route('feeds.destroy', $feed->id) }}">
                            @csrf
                            @method('delete')
                            <button class="ms-1 btn btn-danger btn-sm"> X </button>
                        </form>
                    @endcan
                @endauth
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $feed->created_at->diffForHumans() }} </span>
            </div>
        </div>
    </div>
</div>