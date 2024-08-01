<div class="dropdown">
    <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-ellipsis-vertical"></i>
    </button>
    <ul class="dropdown-menu">
        @can('comment-owner', $comment)
            <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#commentModal{{ $comment->id}}">Edit</a></li>
            <li>
                <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                    @csrf
                    @method('delete')
                    <button class="dropdown-item">Delete</button>
                </form>
            </li>
        @else
            <li><a class="dropdown-item" href="">Report</a></li>
        @endcan
    </ul>
</div>
