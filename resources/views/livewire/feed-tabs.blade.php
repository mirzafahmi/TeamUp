<div>
    @if(session('is_mobile'))
        <ul class="nav nav-tabs d-flex">
            <li class="nav-item flex-fill">
                <a href="#" class="feed-tab nav-link text-center {{ $activeTab === 'all' ? 'active' : '' }}" 
                    wire:click.prevent="setActiveTab('all')"
                >
                    All Feeds
                </a>
            </li>

            @auth()
            <li class="nav-item flex-fill">
                <a href="#" class="feed-tab nav-link text-center {{ $activeTab === 'followed' ? 'active' : '' }}" 
                    wire:click.prevent="setActiveTab('followed')"
                >
                    Following Feeds
                </a>
            </li>
            @endauth
        </ul>
    @else
        <ul class="nav nav-tabs d-flex">
            <li class="nav-item flex-fill p-2">
                <a href="#" class="feed-tab nav-link text-center fs-4 {{ $activeTab === 'all' ? 'active' : '' }}" 
                    wire:click.prevent="setActiveTab('all')"
                >
                    All Feeds
                </a>
            </li>

            @auth()
            <li class="nav-item flex-fill p-2">
                <a href="#" class="feed-tab nav-link text-center fs-4 {{ $activeTab === 'followed' ? 'active' : '' }}" 
                    wire:click.prevent="setActiveTab('followed')"
                >
                    Following Feeds
                </a>
            </li>
            @endauth
        </ul>
    @endif

    <div class="">
        @foreach($feeds as $feed)
            @include('feeds.shared.feed-card', ['showComment' => false])
        @endforeach
    </div>
    {{ $feeds->links() }}
</div>
