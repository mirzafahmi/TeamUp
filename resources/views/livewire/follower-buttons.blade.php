<div class="">
    @if ($isFollowing)
        <button wire:click="toggleFollow" class="btn btn-danger">Unfollow</button>
    @else
        <button wire:click="toggleFollow" class="btn btn-primary">Follow</button>
    @endif
</div>
