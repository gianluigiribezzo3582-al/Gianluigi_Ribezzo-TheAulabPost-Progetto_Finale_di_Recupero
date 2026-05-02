<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Modifica il tuo articolo</h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{ route('article.update', $article) }}" method="POST" class="card p-5 shadow" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo<span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $article->title) }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo<span class="text-danger">*</span></label>
                        <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{ old('subtitle', $article->subtitle) }}">
                        @error('subtitle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Immagine attuale</label>
                        @if($article->image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($article->image) }}" class="img-thumbnail" style="max-height: 200px;" alt="Immagine articolo">
                            </div>
                        @else
                            <p class="text-muted small">Nessuna immagine caricata.</p>
                        @endif
                        <label for="image" class="form-label">Sostituisci immagine</label>
                        <input type="file" name="image" class="form-control" id="image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria<span class="text-danger">*</span></label>
                        <select name="category" id="category" class="form-control">
                            <option disabled>Scegli una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo<span class="text-danger">*</span></label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ old('body', $article->body) }}</textarea>
                        @error('body')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3 d-flex justify-content-center gap-3">
                        <a href="{{ route('writer.dashboard') }}" class="btn btn-outline-secondary">Annulla</a>
                        <button type="submit" class="btn btn-brand">Salva e rimanda in revisione</button>
                    </div>
                    <div class="text-center mt-3">
                        <p class="small text-muted">I campi contrassegnati con <span class="text-danger">*</span> sono obbligatori</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
