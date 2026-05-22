<x-layout>
    <x-slot name="title">Il mio profilo</x-slot>

    <div class="row">
        <div class="col-md-3 text-center">
            @if ($profile && $profile->img)
                <img src="{{ asset('storage/' . $profile->img) }}" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;" alt="Foto profilo">
                @else
                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 150px; height: 150px; font-size:3rem;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            @endif    
        </div>
    

     <div class="col-md-9">
        <h1>{{ Auth::user()->name }}</h1>
        <p class="text-muted">{{ Auth::user()->email }}</p>
        @if ($profile)
            <table class="table table-borderless w-auto">
                <tr>
                    <th>Telefono</th>
                    <td>{{ $profile->tel ?? 'N/A' }}</td>
                </tr>
                @if ($profile->address)
                    <tr>
                        <th>Indirizzo</th>
                        <td>{{ $profile->address ?? 'N/A' }}</td>
                    </tr>
                @endif

                @if ($profile->description)
                    <tr>
                        <th>Descrizione</th>
                        <td>{{ $profile->description ?? 'N/A' }}</td>
                    </tr>
                @endif
            </table>

            @else

            <div class="alert alert-warning">
                Non hai ancora completato il tuo profilo. 
            </div>
        @endif
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Modifica Profilo</a>
        </div>
    </div>

    <hr class="my-4">
    <h3>I miei fumetti </h3>
    @php $comics = auth()->user()->comics()->with('categories')->latest()->get(); @endphp
    @if ($comics->isEmpty())
       <p class="text-muted">Non hai ancora aggiunto nessun fumetto.</p>
    @else
      <div class="list-group">
        @foreach ($comics as $comic)
            <a href="{{ route('comics.show', $comic) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                
                <span> <strong> {{ $comic->title }} </strong> - {{ $comic->number }} {{ $comic->year }} </span>
                @foreach ($comic->categories as $cat)
                    <span class="badge bg-secondary">{{ $cat->name }}</span>
                @endforeach

            </a>
        @endforeach
      </div>
    @endif
</x-layout>