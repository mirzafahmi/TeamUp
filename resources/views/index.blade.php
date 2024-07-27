@extends('layout.desktop')

@section('content')

@auth()    
    <div class="row py-3">
        <div class="col-3">
            @include('partial.breadcrumbs')
        </div>
        <div class="col-6">
            @include('feed.shared.submit-feed')
        </div>
        <div class="col-3">
            @include('partial.search-bar')
        </div>
    </div>
@endauth
@guest()
<div class="row py-3">
        <div class="col-3">
            @include('partial.breadcrumbs')
        </div>
        <div class="col-6">
            <h1>guest</h1>
        </div>
        <div class="col-3">
            @include('partial.search-bar')
        </div>
    </div>
@endguest
@endsection
