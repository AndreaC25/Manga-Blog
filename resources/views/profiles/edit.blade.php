<x-layout>
    <x-slot name="title">Modifica profilo</x-slot>

    <h1 class="mb-4">Modifica il tuo profilo</h1>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tel" class="form-label">Telefono</label>
            <input type="text" name="tel" id="tel" class="form-control @error('tel') is-invalid @enderror" value="{{ old('tel', optional($profile)->tel) }}" required>
            @error('tel')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', optional($profile)->address) }}">
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', optional($profile)->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="img" class="form-label">Immagine del profilo</label>
            @if (optional($profile)->img)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $profile->img) }}" style="height: 100px;" class="rounded" alt="Immagine del profilo attuale">
                    <small class="text-muted d-block">Carica una nuova immagine per sostituire quella attuale</small>
                </div>
            @endif
        
            <input type="file" name="img" id="img" class="form-control @error('img') is-invalid @enderror" accept="image/*">
            @error('img')
             
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salva modifiche</button>
        <a href="{{ route('profile.show') }}" class="btn btn-secondary">Annulla</a>
    </form>
</x-layout>