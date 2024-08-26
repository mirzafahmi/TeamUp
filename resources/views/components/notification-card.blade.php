<li 
    id="notificationItem" 
    class="dropdown-item text-primary {{ !$notification->is_read ? 'unread' : '' }}"
>
    <a href="{{ route('feeds.show', $notification->feed_id) }}" 
        wire:click="markAsRead('{{ $notification->id }}')" 
        class="text-decoration-none"   
    >
        <div class="d-flex align-items-start p-1">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                src="{{ $notification->user->getImageURL()}}" 
                alt="{{ $notification->user->name }}"
            >
            <div class="w-100">
                <div class="d-flex">
                    <div class="me-5">
                        <h6 class="mb-0 text-decoration-underline"> 
                            {{ $notification->user->name }}
                        </h6>
                        <span class="fs-6">
                            &#64;{{$notification->user->username }} 
                        </span>
                    </div>
                    <small class="fs-6 fw-light ms-auto">
                        {{ $notification->created_at->diffForHumans() }}
                    </small>
                </div>
                <div>    
                </div>
                <span class="d-block fs-6 text-wrap">
                    Commented: "{{ $notification->content }}"
                </span>
                @if($notification->request_to_join)
                    <span class="badge text-bg-primary">
                        {{ $notification->playRole->name }}
                    </span>
                    <span class="badge text-bg-{{$notification->joinStatus->bootstrap_tag}}">
                        {{ $notification->joinStatus->name }}
                    </span>
                @endif
            </div>
        </div>
    </a>
</li>