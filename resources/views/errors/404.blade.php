<x-layout>
    <div class="container my-5 py-5">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <h1 class="display-1 fw-bold text-brand mb-4">404</h1>
                <h2 class="mb-4">Questa pagina si è persa tra gli scaffali...</h2>
                <p class="fs-5 text-muted mb-5">
                    Il volume che stai cercando non è presente nel nostro archivio. Forse è stato spostato o non è mai esistito.
                </p>
                <a href="{{ route('homepage') }}" class="btn btn-brand btn-lg px-5">Torna alla Home</a>
            </div>
        </div>
    </div>
</x-layout>