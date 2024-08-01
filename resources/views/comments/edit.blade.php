<div
    class="modal fade" 
    id="commentModal{{ $comment->id}}" 
    tabindex="-1" 
    aria-labelledby="commentModalLabel{{ $comment->id}}" 
    aria-hidden="true"
    >
  <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="commentModalLabel{{ $comment->id}}">Editing comment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('comments.shared.comment-card')
            </div>
            <div class="modal-footer">    
            </div>
        </div>
  </div>
</div>