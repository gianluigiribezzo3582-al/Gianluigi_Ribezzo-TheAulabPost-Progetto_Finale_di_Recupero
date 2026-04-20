<x-layout title="Lavora con noi">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4">Candidati come autore</h2>
                        
                        <form action="{{ route('careers.submit') }}" method="POST">
                            @csrf
                          
                            <div class="mb-3">
                                <label for="email" class="form-label">La tua e-mail</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Perché dovremmo scegliere te?</label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control" required>{{ old('message') }}</textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Invia Candidatura</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>