<div 
	class="modal fade" 
	id="followingModal{{$user->id}}" 
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
					@auth()
					@if (auth()->user()->id == $user->id)
						You not following anyone yet
					@else
						{{ $user->name }} not following anyone yet
					@endif
					@endauth
				@endforelse
			</div>
			<div class="modal-footer">    
			</div>
		</div>
	</div>
</div>
