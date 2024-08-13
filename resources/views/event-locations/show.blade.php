@extends('layout.desktop')

@section('title', $eventLocation->name)

@section('middle-content')
<div class="card mb-3">
    <div class="px-3 pt-4 pb-2">
        <h1 class="mb-3 card-title">
            {{ $eventLocation->name }}
        </h1>
        <span class="fs-4 fw-bold">Address:</span>
        <p>{{ $eventLocation->address }}</p>
        <span class="fs-4 fw-bold">
            <a href="{{ $eventLocation->map_link}}" class="" target="_blank">
                <i class="fa-solid fa-location-dot"></i>
            </a>
            Map Link: 
        </span>
        <span class="text-wrap">{{ $eventLocation->map_link}}</span>
    </div>
</div>
@endsection