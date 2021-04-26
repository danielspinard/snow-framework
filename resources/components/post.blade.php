<div class="col">
    <div class="card">
        <div class="card-body">
            <div class="card-image-background">
                {{-- <img src="src/img/" alt="" class="card-image"> --}}
            </div>
            <a href="{{ route('app.show', ['id' => $id]) }}" class="card-title text-dark text-decoration-none mb-0">
                {{ $title }}
            </a>
            <p class="card-text">
                {{ $content }}
            </p>
        </div>
    </div>
</div>