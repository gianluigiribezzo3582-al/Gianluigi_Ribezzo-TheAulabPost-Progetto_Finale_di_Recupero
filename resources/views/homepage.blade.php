<x-layout>
    <x-slot:title>Home - The Aulab Post</x-slot>

    <div class="container-fluid p-5 bg-body-secondary border-bottom shadow-sm">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-lg-6">
                    <h1 class="display-1 fw-bold text-brand mb-3">Le Storie che Contano</h1>
                    <p class="fs-4 mb-4 opacity-75">Unisciti alla nostra community di autori e lettori. Esplora contenuti esclusivi su tecnologia, design e innovazione.</p>
                    <div class="d-flex gap-3">
                        <button class="btn btn-brand btn-lg px-4">Inizia a Leggere</button>
                        <button class="btn btn-outline-secondary btn-lg px-4">Scopri di più</button>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="p-5 text-center">
                        <i class="bi bi-feather display-1 text-accent opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class="display-4 fw-bold text-brand mb-3">Articoli In Evidenza</h2>
                <div class="bg-accent mx-auto mb-4" style="height: 4px; width: 60px;"></div>
            </div>
        </div>


        //modificare qui per adeguare con post da database
        <div class="row g-4">
            @forelse([1, 2, 3] as $post)
            <div class="col-md-4">
                <div class="card h-100 card-editorial shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-accent text-dark small fw-bold uppercase">Tecnologia</span>
                            <span class="text-muted small">5 min read</span>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Il futuro del Web Development nel 2024</h4>
                        <p class="card-text opacity-75 mb-4">Esploriamo le nuove frontiere delle tecnologie web e come queste cambieranno il modo in cui lavoriamo.</p>
                        <div class="d-flex align-items-center mt-auto">
                            <i class="bi bi-person-circle fs-4 me-2 text-brand"></i>
                            <div>
                                <h6 class="mb-0 fw-bold small">Autore Esempio</h6>
                                <span class="text-muted small">17 Aprile 2024</span>
                            </div>
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
    </div>
</x-layout>
