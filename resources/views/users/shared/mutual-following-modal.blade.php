<div 
	class="modal fade" 
	id="mutualFollowingsModal{{$user->id}}" 
	tabindex="-1" 
	aria-labelledby="mutualFollowingsModal{{$user->id}}" 
	aria-hidden="true"
>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="mutualFollowingsModal{{$user->id}}">Mutual Followings List</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				@foreach($user->mutualFollowings as $mutualFollowing)
					@include('users.shared.follower-following-list', ['intendedUser' => $mutualFollowing])
				@endforeach
			</div>
			<div class="modal-footer">    
			</div>
		</div>
	</div>
</div>
