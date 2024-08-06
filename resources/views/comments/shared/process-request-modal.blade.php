<div
    class="modal fade" 
    id="processRequest{{$comment->id}}" 
    tabindex="-1" 
    aria-labelledby="processRequestLabel{{$comment->id}}" 
    aria-hidden="true"
  >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="processRequestLabel{{$comment->id}}">Request Process</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            @livewire('process-request', ['comment' => $comment])
            
            <div class="modal-footer">    
            </div>
        </div>
    </div>
</div>