@extends('layout.desktop')

@section('content')

<div class="container-md">
        <h2 class = "text-center">Admin Dashboard</h2>
        <hr>
        <div class="card-deck row g-4">
            <x-admin.card 
                title="Sport Category List" 
                description="To view, create, update and delete items of Sport Category." 
                link="{{ route('admin.categories.index') }}" 
            />
            <x-admin.card 
                title="Play Level List" 
                description="To view, create, update and delete items of Play Level." 
                link="{{ route('admin.play-levels.index') }}" 
            />
            <x-admin.card 
                title="Play Mode List" 
                description="To view, create, update and delete items of Play Mode." 
                link="{{ route('admin.play-modes.index') }}" 
            />
            <x-admin.card 
                title="Play Role List" 
                description="To view, create, update and delete items of Play Role." 
                link="{{ route('admin.play-roles.index') }}" 
            />
        </div>
    </div>
@endsection