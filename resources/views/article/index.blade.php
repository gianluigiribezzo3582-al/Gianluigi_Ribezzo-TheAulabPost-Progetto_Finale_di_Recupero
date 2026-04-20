<x-layout>
    <div class="container-fluid p-4 bg-body-secondary border-bottom shadow-sm">
        <div class="container text-center py-2">
            <h1 class="display-5 fw-bold text-brand m-0">Tutti gli Articoli</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row align-items-center justify-content-end mb-4">
            <div class="col-auto">
                <form action="{{ route('article.index') }}" method="GET" class="d-flex align-items-center">
                    <label for="perPage" class="me-2 text-muted small">Mostra:</label>
                    <select name="perPage" id="perPage" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="row g-4">
            @forelse($articles as $article)
            <div class="col-md-4">
                <div class="card h-100 card-editorial shadow-sm">
                    <div style="height: 200px; overflow: hidden;">
                        @if($article->image)
                            <img src="{{ Storage::url($article->image) }}" class="card-img-top w-100 h-100" style="object-fit: cover;" alt="{{ $article->title }}">
                        @else
                            <img src="https://picsum.photos/600/400?random={{ $article->id }}" class="card-img-top w-100 h-100" style="object-fit: cover;" alt="Immagine di default">
                        @endif
                    </div>
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="{{ route('article.byCategory', ['category' => $article->category]) }}" class="badge bg-accent text-dark small fw-bold text-uppercase text-decoration-none">{{ $article->category->name }}</a>
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
                                        <a href="{{ route('article.byUser', ['user' => $article->user]) }}" class="text-reset text-decoration-none">{{ $article->user->first_name }} {{ $article->user->last_name }}</a>
                                    </h6>
                                </div>
                            </div>
                            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-brand btn-sm">Leggi</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="fs-4 opacity-50">Nessun articolo disponibile al momento.</p>
            </div>
            @endforelse
        </div>

        <div class="row mt-5">
            <div class="col-12 d-flex flex-column align-items-center">
                <div class="mb-3 pagination-container">
                    {{ $articles->links() }}
                </div>
                <p class="text-muted small">
                    Mostrati da <strong>{{ $articles->firstItem() }}</strong> a <strong>{{ $articles->lastItem() }}</strong> di <strong>{{ $articles->total() }}</strong> articoli
                </p>
            </div>
        </div>
</x-layout>