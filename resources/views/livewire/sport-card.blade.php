<div>
    @if (!$isLiked)
        <div class="d-flex align-items-center p-1">
            <img 
                style="width:45px; height: 45px" 
                class="me-2 avatar-sm rounded-circle" 
                src="{{ $sport->getImageURL() }}"
                alt="{{ $sport->name}} image"
            >
            <h5 class="card-title mb-0">
                {{ $sport->name}}
            </h5>
            <div class="ms-auto">
                <a href="#" class="" wire:click.prevent="toggleLike"><i class="fa-regular fa-heart"></i></a>
            </div>
        </div>
        <x-rounded-circle-display 
            title="Your Followings"
            :details="$sport->preferredByMutualFollowings->take(3)"
            routeName="users.show"
            emptyTitle="Not found"
            :count="$sport->preferredByMutualFollowings->count()"
            modalName="preferredByMutualFollowings"
            :user="$sport"
        />
    @else
        @if(!$sport->preferredByMutualFollowings->isEmpty())
            <div class="d-flex flex-column align-items-center justify-content-center">
                <p class="text-center">
                    You and <strong>&#64;{{ $sport->preferredByMutualFollowings->first()->username }}</strong> liked <strong>{{ $sport->name }}</strong>
                </p>
                <a href="#" class="" wire:click.prevent="toggleLike">
                    <i class="fa-solid fa-rotate-left me-1"></i>Undo
                </a>
            </div>
        @else
            <div class="d-flex flex-column align-items-center justify-content-center">
                <p class="text-center">
                    You liked <strong>{{ $sport->name }}</strong>
                </p>
                <a href="#" class="" wire:click.prevent="toggleLike">
                    <i class="fa-solid fa-rotate-left me-1"></i>Undo
                </a>
            </div>
        @endif
    @endif
    @if($index < $totalCount - 1)
        <hr>
    @endif
</div>

