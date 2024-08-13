@extends('layout.base')

@section('content')
 
<div class="row py-3">
    <div class="col-3">
        @include('partial.breadcrumbs')
    </div>
    <div class="col-9">
        @yield('middle-content')
    </div>
</div>
@endsection
