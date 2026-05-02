<x-layout>
    <x-slot:title>La mia Dashboard - The Aulab Post</x-slot>

    <div class="container-fluid p-3 bg-body-secondary border-bottom shadow-sm">
        <div class="container text-center py-2">
            <h1 class="display-5 fw-bold text-brand m-0">La mia Dashboard</h1>
        </div>
    </div>

    <div class="container my-5">

        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <x-writer-articles-table :articles="$toReview" status="to_review" />
        <x-writer-articles-table :articles="$accepted" status="accepted" />
        <x-writer-articles-table :articles="$rejected" status="rejected" />

    </div>
</x-layout>
