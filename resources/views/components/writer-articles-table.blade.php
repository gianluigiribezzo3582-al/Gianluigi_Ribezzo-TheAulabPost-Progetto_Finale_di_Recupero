@props(['articles', 'status'])

<div class="mb-5">
    <h5 class="fw-bold text-brand mb-3">
        @if($status === 'to_review') In attesa di revisione
        @elseif($status === 'accepted') Articoli Pubblicati
        @else Articoli Rifiutati
        @endif
    </h5>

    @if($articles->isEmpty())
        <p class="text-muted small">Nessun articolo in questa categoria.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle bg-body-secondary shadow-sm rounded">
                <thead class="table-dark">
                    <tr>
                        <th>Titolo</th>
                        <th>Categoria</th>
                        <th>Data</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->category->name ?? '—' }}</td>
                            <td>{{ $article->created_at->format('d/m/Y') }}</td>
                            <td class="d-flex gap-2 flex-wrap">
                                <a href="{{ route('article.show', $article) }}" class="btn btn-outline-brand btn-sm">Leggi</a>
                                @if($status !== 'to_review')
                                    <a href="{{ route('article.edit', $article) }}" class="btn btn-brand btn-sm">Modifica</a>
                                    <form action="{{ route('article.destroy', $article) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
