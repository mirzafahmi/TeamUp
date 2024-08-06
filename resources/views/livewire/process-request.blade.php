<div class="modal-body d-flex align-items-center">
    <div class="d-flex align-items-start p-1">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
            src="{{ $comment->user->getImageURL()}}" 
            alt="{{ $comment->user->name }}"
        >
        <div class="w-100">
            <div class="d-flex">
                <div class="me-5">
                    <h6 class="mb-0 text-decoration-underline"> 
                        {{ $comment->user->name }}
                    </h6>
                    <span class="fs-6">
                        &#64;{{$comment->user->username }} 
                    </span>
                </div>
            </div>
            <span class="d-block fs-6">
                Commented: "{{ $comment->content }}"
            </span>
            @if($comment->request_to_join)
                <span class="badge text-bg-primary">
                    {{ $comment->playRole->name }}
                </span>
                <span class="badge text-bg-{{ $comment->joinStatus->bootstrap_tag}}">
                    {{ $comment->joinStatus->name }}
                </span>
            @endif
        </div>
    </div>
    <div class="ms-auto">
        @if($comment->joinStatus->name == 'Pending')
            <button wire:click="updateStatus('Approved')" class="btn btn-dark" title="Approved">
                <i class="fa-solid fa-check"></i>
            </button>
            <button wire:click="updateStatus('Rejected')" class="btn btn-light ms-3 border-1 border-primary" title="Rejected">
                <i class="fa-solid fa-times"></i>
            </button>
        @else
            <button wire:click="updateStatus('Pending')" class="btn btn-dark" title="Cancel Request Process">
                <i class="fa-solid fa-clock-rotate-left"></i>
            </button>
        @endif
    </div>
</div>