<x-layout>
    <x-slot name="title">{{ $comic->title }}</x-slot>

    <div class="row">
        <div class="col-md-4">
            @if ($comic->img)
                <img src="{{ asset('storage/' . $comic->img) }}" 
                class="img-fluid rounded" alt="{{ $comic->title }}">    
            @else
               <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 300px;">
                    <span>Nessuna Copertina</span>
                </div>
            @endif
        </div>

        <div class="col-md-8">
        <h1>{{ $comic->title }}</h1>
        <p class="text-muted">
            N° {{ $comic->number }} &bull; Anno {{ $comic->year }}
        </p>

        @if ($comic->magazine)
            <p>
                <strong>Rivista:</strong> {{ $comic->magazine->name }}
                ({{ $comic->magazine->nationality }})
            </p>
        @endif

        <p>
            <strong>Autore</strong>
            <a href="{{ route('users.show', $comic->user) }}">
                {{ $comic->user->name }}
            </a>
        </p>


        <div>
            <strong>Categorie</strong>
            @foreach ($comic->categories as $cat)
                <span class="badge bg-secondary">{{ $cat->name }}</span>
                
            @endforeach
        </div>

        <h5>Trama</h5>
        <p>{{ $comic->plot }}</p>

        @auth
            @if (auth()->id() === $comic->user_id)
            <div class="d-flex gap-2 mt-4">
            <a href="{{ route('comics.edit', $comic) }}" class="btn btn-primary">Modifica</a>   
            <form action="{{ route('comics.destroy', $comic) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo fumetto?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
            </div>
            @endif
        @endauth
        </div>
    </div>

 

    <div class="mt-4">
        <a href="{{ route('comics.index') }}" class="btn btn-secondary">Torna alla lista</a>
    </div>
</x-layout>