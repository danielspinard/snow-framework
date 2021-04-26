@extends('layouts.theme')

@section('content')
    <div class="pt-5"></div>

    <div class="card-group">
        <div class="p-3"></div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($posts as $post)
                @component('components.post')
                    @slot('id', $post->post_id)
                    @slot('title', $post->title)
                    @slot('content', $post->content)
                @endcomponent
            @empty
                <h4>Sorry!, We didn't find any post!</h4>
            @endforelse
        </div>
        
        <div class="p-3"></div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">

    <style>
        .card:hover{
            cursor: pointer;
            transform: scale(1.05);
            transition: 200ms;
        }
    </style>
@endpush