<div 
  class="modal fade" 
  id="followingModal" 
  tabindex="-1" 
  aria-labelledby="followingModalLabel" 
  aria-hidden="true"
  >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="followingModalLabel">Followings List</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @forelse($followings as $intendedUser)
            @include('users.shared.follower-following-list', $intendedUser)
        @empty
          You dont follow anyone yet
        @endforelse
      </div>
      <div class="modal-footer">    
      </div>
    </div>
  </div>
</div>
