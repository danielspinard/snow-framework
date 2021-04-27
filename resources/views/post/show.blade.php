@extends('layouts.theme')

@section('content')
    <div class="p-5"></div>

    @component('components.post')
        @slot('id', $post->post_id)
        @slot('title', $post->title)
        @slot('content', $post->content)
    @endcomponent
@endsection

@push('style')
    <link rel="stylesheet" href="@asset('assets/css/card.css')">
@endpush