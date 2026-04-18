<x-layout title="Accedi">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4">Eccoti qui di nuovo!</h2>
                        
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email o Username <span class="text-danger">*</span></label>
                                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                <label class="form-check-label" for="remember">Ricordami</label>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Accedi</button>
                            </div>

                            <div class="text-center mt-3">
                                <span>Non hai un account? <a href="{{ route('register') }}">Registrati</a></span>
                            </div>
                        </form>
                        <p class="small text-muted mb-4 text-center">I campi contrassegnati con <span class="text-danger">*</span> sono obbligatori</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
