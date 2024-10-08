@auth()
    <div class="p-3">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center">
                <img 
                    style="width:35px" 
                    class="me-2 avatar-sm rounded-circle" 
                    src="{{ $comment->user->getImageURL() }}"
                    alt="{{ $comment->user->name }}"
                >
                <div>
                    <h6 class="mb-0 card-title">
                        <a href="{{ route('users.show', $comment->user->id) }}">
                            {{ $comment->user->name }}
                        </a>
                    </h6>
                    <span class="fs-6 text-muted">
                        &#64;{{ $comment->user->username }} 
                    </span>
                </div>
            </div>
        </div>
        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
                <input type="hidden" name="feed_id" value="{{ $comment->feed->id }}">
                <input type="hidden" name="user_id" value="{{ $comment->user->id }}">
                <textarea name="content" class="fs-6 form-control" rows="1">{{ $comment->content }}</textarea>
                @if(auth()->user()->id != $feed->user->id )
                @livewire('request-to-join', [
                        'feedId' => $feed->id, 
                        'showRoleDropdown' => $comment->request_to_join, 
                        'selectedRole' => $comment->play_role_id, 
                        'editing' => true
                    ])
                @endif
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-sm"> Edit Comment </button>
            </div>
        </form>
    </div>
@endauth