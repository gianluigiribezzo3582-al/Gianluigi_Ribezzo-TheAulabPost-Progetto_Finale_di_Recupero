<x-layout>
    <div class="container-fluid p-5 bg-body-secondary border-bottom shadow-sm">
        <div class="container text-center py-5">
            <h1 class="display-1 fw-bold text-brand">{{ $article->title }}</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                @if($article->image)
                    <img src="{{ Storage::url($article->image) }}" class="img-fluid rounded shadow-sm mb-4 w-100" alt="{{ $article->title }}">
                @else
                    <img src="https://picsum.photos/1200/600" class="img-fluid rounded shadow-sm mb-4 w-100" alt="Immagine di default">
                @endif
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <a href="{{ route('article.byCategory', ['category' => $article->category]) }}" class="badge bg-accent text-dark small fw-bold text-uppercase text-decoration-none">{{ $article->category->name }}</a>
                        <span class="text-muted ms-2">Pubblicato il {{ $article->created_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-circle fs-4 me-2 text-brand"></i>
                        <h6 class="mb-0 fw-bold">
                            <a href="{{ route('article.byUser', ['user' => $article->user]) }}" class="text-reset text-decoration-none">{{ $article->user->first_name }} {{ $article->user->last_name }}</a>
                        </h6>
                    </div>
                </div>

                <h4 class="text-muted mb-4">{{ $article->subtitle }}</h4>
                <div class="article-body fs-5 opacity-75">
                    {{ $article->body }}
                </div>
                
                <div class="mt-5 pt-5 border-top">
                    <a href="{{ route('article.index') }}" class="btn btn-outline-brand">Torna alla lista</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>