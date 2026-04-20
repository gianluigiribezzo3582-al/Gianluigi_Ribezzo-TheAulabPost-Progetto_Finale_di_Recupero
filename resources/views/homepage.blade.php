<x-layout>
    <x-slot:title>Home - The Aulab Post</x-slot>

    <style>
        .welcome-section {
            transition: all 1s ease-in-out;
        }

        .fade-out-bottom {
            opacity: 0 !important;
            transform: translateY(50px);
        }
    </style>

    <div class="container-fluid p-5 bg-body-secondary border-bottom shadow-sm">
        <div class="container">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('status') == 'login')
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Bentornato, <strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong>, siamo lieti di rivederti!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('status') == 'user-registered')
                <div class="welcome-section text-center p-5 mb-5 bg-brand text-white rounded shadow-lg border-brand">
                    <h2 class="display-3 fw-bold mb-3">Benvenuto/a a bordo!</h2>
                    <p class="fs-4">Grazie per esserti registrato/a, <strong>{{ Auth::user()->first_name }}</strong>.</p>
                </div>
                <script>
                    setTimeout(function() {
                        const section = document.querySelector('.welcome-section');
                        if (section) {
                            section.classList.add('fade-out-bottom');
                        }
                    }, 3000);

                    setTimeout(function() {
                        window.location.href = "{{ route('homepage') }}";
                    }, 4000);
                </script>
            @endif
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
                        <h4 class="card-title fw-bold mb-3">Il futuro del Web Development nel 2026</h4>
                        <p class="card-text opacity-75 mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore consectetur doloribus at dolor labore iure voluptas odio asperiores? Quas magnam doloribus veniam corrupti sunt vero error cumque iste fugit possimus. Aliquid fugiat enim maxime exercitationem hic corrupti libero, atque laboriosam, autem, id nulla eum odio rerum ipsum odit reiciendis sequi.</p>
                        <div class="d-flex align-items-center mt-auto">
                            <i class="bi bi-person-circle fs-4 me-2 text-brand"></i>
                            <div>
                                <h6 class="mb-0 fw-bold small">Autore Esempio</h6>
                                <span class="text-muted small">17 Aprile 2026</span>
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
