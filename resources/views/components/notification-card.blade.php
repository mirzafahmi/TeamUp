@props([
    'isDropdown' => false
])

<li 
    id="notificationItem" 
    class="dropdown-item {{ $isDropdown && !$notification['is_read'] ? 'unread' : '' }}"
>
    <a href="{{ route('feeds.show', $notification['feed']->id) }}" 
        wire:click="markAsRead('{{ $notification['id'] }}')" 
        class="text-decoration-none"   
    >
        <div class="d-flex align-items-start p-1">
            <img style="width:35px; height:35px" class="me-2 avatar-sm rounded-circle"
                src="{{ $notification['comment']->user->getImageURL() }}" 
                alt="{{ $notification['comment']->user->name }}"
            >
            <div class="w-100">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h6 class="mb-0 text-decoration-underline"> 
                            {{ $notification['comment']->user->name }}
                        </h6>
                        <span class="fs-6">
                            &#64;{{$notification['comment']->user->username }} 
                        </span>
                    </div>
                    <span class="fs-6 fw-light text-nowrap ms-3">
                        {{ $notification['comment']->created_at->diffForHumans() }}
                    </span>
                </div>
                <span class="d-block fs-6 text-wrap mt-1">
                    Commented: "{{ $notification['comment']->content }}"
                </span>
                @if($notification['comment']->request_to_join)
                    <div class="mt-2">
                        <span class="badge text-bg-primary">
                            {{ $notification['comment']->playRole->name }}
                        </span>
                        <span class="badge text-bg-{{$notification['comment']->joinStatus->bootstrap_tag}}">
                            {{ $notification['comment']->joinStatus->name }}
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </a>
</li>
