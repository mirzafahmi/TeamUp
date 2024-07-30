<div
    class="modal fade" 
    id="followerModal" 
    tabindex="-1" 
    aria-labelledby="followerModalLabel" 
    aria-hidden="true"
  >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="followerModalLabel">Followers List</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @forelse($followers as $intendedUser)
            @include('users.shared.follower-following-list', $intendedUser)
        @empty
          You dont have follower yet
        @endforelse
      </div>
      <div class="modal-footer">    
      </div>
    </div>
  </div>
</div>
