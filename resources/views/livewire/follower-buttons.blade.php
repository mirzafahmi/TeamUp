<div class="">
    @if (session('is_mobile'))
        @if ($isFollowing)
            <button wire:click="toggleFollow" class="btn btn-light btn-sm border-1 border-dark"><i class="fa-solid fa-user-plus"></i></button>
        @else
            <button wire:click="toggleFollow" class="btn btn-dark btn-sm"><i class="fa-solid fa-user-plus"></i></button>
        @endif
    @else
        @if ($isFollowing)
            <button wire:click="toggleFollow" class="btn btn-light border-1 border-dark">Unfollow</button>
        @else
            <button wire:click="toggleFollow" class="btn btn-dark">Follow</button>
        @endif
    @endif
</div>
