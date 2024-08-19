@forelse ($comments as $comment)
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
            <div class="fs-6 mt-2 fw-light">
                <p class="mb-0 ps-1">
                    {{ $comment->content }}
                </p>
                @if($comment->playRole)
                    <span class="badge text-bg-primary">
                        {{ $comment->playRole->name }}
                    </span>
                    <span class="badge text-bg-{{$comment->joinStatus->bootstrap_tag}}">
                        {{ $comment->joinStatus->name }}
                    </span>
                @endif
            </div>
        </div>
        @include('components.comments-settings-dropdown')
    </div>
    @if ($comment->request_to_join)
        @include('comments.shared.process-request-modal', ['comment' => $comment])
    @endif
    @include('comments.edit', ['comment' => $comment])
@empty
    <p class="text-center mt-3">No Comments Found.</p>
@endforelse
@include('comments.create')

