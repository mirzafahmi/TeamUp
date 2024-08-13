@props([
    'title',
    'details',
    'routeName',
    'emptyTitle',
    'count',
    'modal' => false,
    'modalName',
    'user',
])


<div class="col mt-4">
    <h6 class="fs-6">{{ $title }} : </h6>
    <div class="d-flex">
        <div class="me-2 d-inline px-1">
            @forelse($details as $detail)
                <span 
                    class="d-inline-block pe-1" 
                    tabindex="0" 
                    data-bs-toggle="popover" 
                    data-bs-trigger="hover focus" 
                    data-bs-placement="bottom"
                    data-bs-content="&#64;{{ $detail->username }}"
                >   
                    <a href="{{ route($routeName, $detail->id) }}">
                        <img style="width:30px" class="avatar-sm rounded-circle"
                            src="{{ $detail->getImageURL()}}" 
                            alt="{{ $detail->username }}"
                        >
                    </a>
                </span>
            @empty
                <span class="fs-6 text-muted p-2">{{ $emptyTitle }}</span>
            @endforelse
        </div>
        @if($count > 1 && $modal)
        <div class="d-flex justify-content-center align-items-center ms-2">
            <a href="#" 
                style="width: 31px; height: 31px; display: flex; align-items: center; justify-content: center;" 
                class="border-1 border-secondary p-2 rounded-circle text-decoration-none" 
                data-bs-toggle="modal" 
                data-bs-target="#{{$modalName}}Modal{{$user->id}}"
            > 
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        </div>
        @endif
    </div>
</div>