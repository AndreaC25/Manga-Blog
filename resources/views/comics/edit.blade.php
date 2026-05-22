<x-layout>
    <x-slot name="title">Modifica</x-slot>

    <h1 class="mb-4">Modifica fumetto</h1>

    <form action="{{ route('comics.update', $comic) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $comic->title) }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="number" class="form-label">Numero</label>
                <input type="number" name="number" id="number" class="form-control @error('number') is-invalid @enderror" value="{{ old('number', $comic->number) }}" required>
                @error('number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="year" class="form-label">Anno di pubblicazione</label>
                <input type="number" name="year" id="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year', $comic->year) }}" min="1900" max="{{ date('Y') }}" required>
                @error('year')
                    <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
            </div>
        </div>
            <div class="mb-3">
                <label for="plot" class="form-label">Trama</label>
                <textarea name="plot" id="plot" class="form-control @error('plot') is-invalid @enderror" required>{{ old('plot', $comic->plot) }}</textarea>
                @error('plot')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Copertina</label>
            @if ($comic->img)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $comic->img) }}" style="height: 100px;" class="rounded" alt="Copertina attuale">
                    <small class="text-muted d-block">Carica una nuova immagine per sostituire quella attuale</small>
                    
                </div>
            <@endif    
            <input type="file" name="img" id="img" class="form-control @error('img') is-invalid @enderror" accept="image/*">
            @error('img')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="magazine_id" class="form-label">Rivista</label>
            <select name="magazine_id" id="magazine_id" class="form-select">
                <option value="">-- Nessuna rivista --</option>
                @foreach ($magazines as $magazine)
                    <option value="{{ $magazine->id }}" {{ old('magazine_id', $comic->magazine_id) == $magazine->id ? 'selected' : '' }}>
                        {{ $magazine->name }} ({{ $magazine->nationality }})
                    </option>   
                @endforeach
            </select>

        </div>

        <div class="mb-4">
            <label class="form-label">Categorie</label>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-6 col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}"
                            {{ in_array($category->id, old('categories', $comic->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <label class="form-check-label" for="category-{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Aggiorna Fumetto</button>
        <a href="{{ route('comics.show' , $comic) }}" class="btn btn-outline-secondary ms-2">Annulla</a>
    </form>
</x-layout>