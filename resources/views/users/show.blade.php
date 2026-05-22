<x-layout>
    <x-slot name="title">Profilo di {{ $user->name }}</x-slot>

    <div class="row mb-5">
        <div class="col-md-3 text-center">
            @if (optional($user->profile)->img)
                <img src="{{ asset('storage/' . $user->profile->img) }}" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;" alt="{{ $user->name }}">
            @else
                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 150px; height: 150px; font-size:3rem;">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
        </div>
        <div class="col-md-9">
            <h1>{{ $user->name }}</h1>
            @if ($user->profile)
             @if ($user->profile->tel)
                <p><strong>Telefono:</strong> {{ $user->profile->tel }}</p>
             @endif
             @if ($user->profile->address)
                <p><strong>Indirizzo:</strong> {{ $user->profile->address }}</p>
             @endif
             @if ($user->profile->description)
                <p> {{ $user->profile->description }}</p>
             @endif
            @endif
                
            
        </div>
    </div>

    <h3>Fumetti di {{ $user->name }}</h3>
    @if ($user->comics->isEmpty())
        <p class="text-muted">Non ci sono fumetti associati a questo utente.</p>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($user->comics as $comic)
                <div class="col">
                    <div class="card h-100">
                        @if($comic->img)
                        <img src="{{ asset('storage/' . $comic->img) }}" class="card-img-top" style="height: 200px;object-fit:cover;" alt="{{ $comic->title }}">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px; ">
                                <span>Nessuna copertina</span>
                            </div>
                        @endif
                            <div class="card-body">

                                <h5 class="card-title">{{ $comic->title }}</h5>
                                <p class="text-muted small">N° {{ $comic->number }} &bull; {{ $comic->year}}</p>
                                 <div> 
                                    @foreach ($comic->categories as $cat)
                                        <span class="badge bg-secondary">{{ $cat->name }}</span>    
                                    @endforeach
                                </div> 
                            </div>
                            <div class="card-footer">
                                    <a href="{{ route('comics.show', $comic) }}" class="btn btn-primary">Dettagli</a>
                                </div>
                        </div>
                    </div>

                     @endforeach
        </div>
                        @endif

                        <div class="mt-4">
                            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">&larr; Tutti i fumettisti</a>
                        </div>

</x-layout>
