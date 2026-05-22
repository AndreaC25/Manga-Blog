<x-layout>
    <x-slot name="title">Tutti i fumetti</x-slot>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-4">Fumetti</h1>
        @auth
            <a href="{{ route('comics.create') }}" class="btn btn-primary">Nuovo Fumetto</a> 
        @endauth
        <div>
            @if ($comics->isEmpty())
            <p class="text-muted">Nessun fumetto trovato.</p>
            @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($comics as $comic)
                    <div class="col">
                        <div class="card h-100">
                            @if ($comic->img)
                            <img src="{{ asset('storage/' . $comic->img) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $comic->title }}">
                            @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                                <span class="text-muted">Nessuna copertina disponibile</span>
                            </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $comic->title }}</h5>
                                <p class="card-text text-muted small">{{ $comic->number }} &bull; {{ $comic->year }} &bull; {{ $comic->user->name }}</p>
                                <div class="mb-2">
                                    @foreach ($comic->categories as $cat)
                                        <span class="badge bg-secondary">{{ $cat->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                                 <div class="card-footer text-center">
                                    <a href="{{ route('comics.show', $comic) }}" class="btn btn-sm btn-outline-primary">Vedi Dettagli</a>   
                             </div>
                        </div>

                @endforeach
            </div>
            @endif
        </div>
        
    </div>
    </x-layout>