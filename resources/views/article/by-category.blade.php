<x-layout>
    <div class="container-fluid p-3 bg-body-secondary border-bottom shadow-sm">
        <div class="container text-center py-5">
            <h1 class="display-4 fw-bold text-brand">{{ $category->name }}</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row g-4">
            @forelse($articles as $article)
            <div class="col-md-4">
                <div class="card h-100 card-editorial shadow-sm">
                    <div style="height: 200px; overflow: hidden;">
                        @if($article->image)
                            <img src="{{ Storage::url($article->image) }}" class="card-img-top w-100 h-100" style="object-fit: cover;" alt="{{ $article->title }}">
                        @else
                            <img src="https://picsum.photos/600/400" class="card-img-top w-100 h-100" style="object-fit: cover;" alt="{{ $article->title }}">
                        @endif
                    </div>
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-accent text-dark small fw-bold text-uppercase">{{ $article->category->name }}</span>
                            <span class="text-muted small">{{ $article->created_at->format('d/m/Y') }}</span>
                        </div>
                        <h4 class="card-title fw-bold mb-3">{{ $article->title }}</h4>
                        <h6 class="card-subtitle mb-3 text-muted">{{ $article->subtitle }}</h6>
                        <p class="card-text opacity-75 mb-4">{{ Str::limit($article->body, 150) }}</p>
                        <div class="d-flex align-items-center mt-auto justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person-circle fs-4 me-2 text-brand"></i>
                                <div>
                                    <h6 class="mb-0 fw-bold small">
                                        <a href="{{ route('article.byUser', ['user' => $article->user, 'name' => $article->user->getSlug()]) }}" class="text-reset text-decoration-none">{{ $article->user->getFullName() }}</a>
                                    </h6>
                                </div>
                            </div>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-brand btn-sm">Leggi</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="fs-4 opacity-50">Nessun articolo disponibile per questa categoria.</p>
            </div>
            @endforelse
        </div>
    </div>
</x-layout>