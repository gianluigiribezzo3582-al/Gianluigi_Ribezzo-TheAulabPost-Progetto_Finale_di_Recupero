<x-layout title="Lavora con noi">
    <div class="container-fluid p-3 bg-body-secondary border-bottom shadow-sm">
        <div class="container text-center py-2">
            <h1 class="display-4 fw-bold text-brand">Lavora con noi</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow border-0 p-5 mb-5 bg-body-secondary">
                    <div class="card-body text-center">
                        <h2 class="fw-bold mb-4 text-brand">Unisciti al nostro Team</h2>
                        <p class="fs-5 opacity-75 mb-4">The Aulab Post è un ecosistema editoriale basato sulla collaborazione. Ogni ruolo ha responsabilità precise per garantire la qualità dell'informazione. Se vuoi far parte della nostra community, scegli il ruolo più adatto a te.</p>
                    </div>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-body-tertiary p-4 shadow-sm">
                            <h4 class="fw-bold text-brand"><i class="bi bi-pencil-square me-2"></i>Writer</h4>
                            <p class="small opacity-75">I redattori possono creare articoli, gestire i propri pezzi dalla dashboard e modificarli finché non vengono pubblicati.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-body-tertiary p-4 shadow-sm">
                            <h4 class="fw-bold text-brand"><i class="bi bi-eye me-2"></i>Revisor</h4>
                            <p class="small opacity-75">I revisori hanno una dashboard dedicata per accettare, rifiutare o rimandare in revisione gli articoli in attesa.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-body-tertiary p-4 shadow-sm">
                            <h4 class="fw-bold text-brand"><i class="bi bi-shield-lock me-2"></i>Admin</h4>
                            <p class="small opacity-75">Gestisce l'intera piattaforma: approva le candidature, assegna i ruoli e gestisce categorie e tag.</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mt-5">
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm p-5 card-editorial">
                            @auth
                                <h3 class="fw-bold text-center mb-4">Inviaci la tua candidatura</h3>
                                <form action="{{ route('careers.submit') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Per quale ruolo ti candidi?</label>
                                        <select name="role" id="role" class="form-control" required>
                                            <option value="" selected disabled>Scegli il ruolo</option>
                                            @if(!Auth::user()->is_admin && Auth::user()->role !== 'requested_admin')
                                                <option value="admin">Amministratore</option>
                                            @endif
                                            @if(!Auth::user()->is_revisor && Auth::user()->role !== 'requested_revisor')
                                                <option value="revisor">Revisore</option>
                                            @endif
                                            @if(!Auth::user()->is_writer && Auth::user()->role !== 'requested_writer')
                                                <option value="writer">Redattore</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">La tua e-mail</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Parlaci di te</label>
                                        <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Inserisci qui la tua presentazione..." required>{{ old('message') }}</textarea>
                                    </div>
                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-brand btn-lg">Invia Candidatura</button>
                                    </div>
                                </form>
                            @else
                                <div class="text-center p-4 bg-body-secondary card shadow-sm">
                                    <h3 class="fw-bold mb-4 text-brand">Vuoi unirti a noi?</h3>
                                    <p class="mb-4">Per poterti candidare ai ruoli della piattaforma, devi prima far parte della nostra community.</p>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="{{ route('login') }}" class="btn btn-outline-brand px-4">Accedi</a>
                                        <a href="{{ route('register') }}" class="btn btn-brand px-4">Registrati</a>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
