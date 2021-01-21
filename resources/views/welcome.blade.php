@extends('layouts.theme')

@section('content')
    <div class="pt-5"></div>

    <div class="card-group">
        <div class="p-3"></div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($posts as $post)
                @component('components.post')
                    @slot('title', $post->title)
                    @slot('content', $post->content)
                @endcomponent
            @endforeach
        </div>
        
        <div class="p-3"></div>
    </div>
@endsection
