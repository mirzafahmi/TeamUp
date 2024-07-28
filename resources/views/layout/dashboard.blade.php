@extends('layout.desktop')

@section('content')
 
<div class="row py-3">
    <div class="col-3">
        @include('partial.breadcrumbs')
    </div>
    <div class="col-6">
        @yield('middle-content')
    </div>
    <div class="col-3">
        @include('partial.search-bar')
    </div>
</div>
@endsection
