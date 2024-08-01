@forelse ($feed->comments as $comment)
    <div class="d-flex align-items-start p-3">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
            src="{{ $comment->user->getImageURL()}}" 
            alt="{{ $comment->user->name }}"
        >
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <div>
                    <h6 class="mb-0"> 
                        <a href="{{ route('users.show', $comment->user_id)}}">
                            {{ $comment->user->name }}
                        </a>
                    </h6>
                    <span class="fs-6 text-muted">
                        &#64;{{$comment->user->username }} 
                    </span>
                </div>
                <small class="fs-6 fw-light text-muted">
                    {{ $comment->created_at->diffForHumans() }}
                </small>
            </div>
            <p class="fs-6 mt-2 fw-light">
                {{ $comment->content }}
            </p>
        </div>
        @include('components.comments-settings-dropdown')
    </div>
    @include('comments.edit', ['comment' => $comment])
@empty
    <p class="text-center mt-3">No Comments Found.</p>
@endforelse
@include('comments.create')
