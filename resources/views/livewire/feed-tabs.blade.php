<div>
    @auth()
    <ul class="nav nav-tabs d-flex">
        <li class="nav-item flex-fill">
            <a href="#" class="nav-link text-center {{ $activeTab === 'all' ? 'active' : '' }}" 
                wire:click.prevent="setActiveTab('all')"
            >
                All Feeds
            </a>
        </li>
        
        <li class="nav-item flex-fill">
            <a href="#" class="nav-link text-center {{ $activeTab === 'followed' ? 'active' : '' }}" 
                wire:click.prevent="setActiveTab('followed')"
            >
                Following Feeds
            </a>
        </li>
        @endauth
    </ul>

    <div class="">
        @foreach($feeds as $feed)
            @include('feeds.shared.feed-card', ['showComment' => false])
        @endforeach
    </div>
    {{ $feeds->links() }}
</div>
