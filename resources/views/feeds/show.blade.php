@extends('layout.desktop')

@section('title', $feed->content)

@section('middle-content')
    @include('feeds.shared.feed-card', ['showComment' => true])
@endsection