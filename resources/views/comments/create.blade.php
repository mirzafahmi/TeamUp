@auth()
    <hr>
    <div class="p-3">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center">
                <img 
                    style="width:35px" 
                    class="me-2 avatar-sm rounded-circle" 
                    src="{{ auth()->user()->getImageURL() }}"
                    alt="{{ auth()->user()->name }}"
                >
                <div>
                    <h6 class="mb-0 card-title">
                        <a href="{{ route('users.show', auth()->user()->id) }}">
                            {{ auth()->user()->name }}
                        </a>
                    </h6>
                    <span class="fs-6 text-muted">
                        &#64;{{ auth()->user()->username }} 
                    </span>
                </div>
            </div>
        </div>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="feed_id" value="{{ $feed->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
                @if(auth()->user()->id != $feed->user->id )
                    @livewire('request-to-join', ['feedId' => $feed->id])
                @endif
            </div>
            <div>
                <button type="submit" class="btn btn-dark btn-sm"> Post Comment </button>
            </div>
        </form>
    </div>
@endauth