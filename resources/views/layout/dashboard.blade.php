@extends('layout.desktop')

@section('content')
 
<div class="row py-3">
    <div class="col-3">
        @include('partial.breadcrumbs')

        @auth
            @if (request()->is('/'))
                @include('partial.sport-suggestion')
            @endif
        @endauth
    </div>
    <div class="col-9">
        @yield('middle-content')
    </div>
</div>
@endsection
