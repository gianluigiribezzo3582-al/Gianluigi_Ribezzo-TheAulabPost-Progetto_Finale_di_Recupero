<x-layout>
    <div class="container-fluid p-3 bg-body-secondary border-bottom shadow-sm">
        <div class="container text-center py-2">
            <h1 class="display-6 fw-bold text-brand m-0">Tutti gli Articoli</h1>
        </div>
    </div>

    <div class="container my-5 ">
        <div class="row align-items-center justify-content-between mb-4">
            <div class="col-md-4">
                <form action="{{ route('article.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cerca per autore..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-brand btn-sm">Cerca</button>
                    @if(request('search'))
                        <a href="{{ route('article.index') }}" class="btn btn-outline-secondary btn-sm ms-2">Reset</a>
                    @endif
                </form>
            </div>
            <div class="col-auto">
                <form action="{{ route('article.index') }}" method="GET" class="d-flex align-items-center">
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    <label for="perPage" class="me-2 text-muted small">Mostra:</label>
                    <select name="perPage" id="perPage" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                        <option value="12" {{ request('perPage') == 12 ? 'selected' : '' }}>12</option>
                        <option value="48" {{ request('perPage') == 48 ? 'selected' : '' }}>48</option>
                        <option value="96" {{ request('perPage') == 96 ? 'selected' : '' }}>96</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="row g-4">
            @forelse($articles as $article)
            <div class="col-md-4">
                <div class="card h-100 card-editorial shadow-sm">
                    @if($article->image)
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top w-100" style="max-height: 220px; object-fit: cover;" alt="{{ $article->title }}">
                    @endif
                    <div class="card-body p-4 d-flex flex-column bg-body-secondary">
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