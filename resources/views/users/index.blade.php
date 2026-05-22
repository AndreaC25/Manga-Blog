<x-layout>
    <x-slot name="title">Fumettisti</x-slot>

    <h1 class="mb-4">Fumettisti</h1>

    @if ($users->isEmpty())
        <p class="text-muted">Non ci sono fumettisti registrati.</p>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($users as $user)
                <div class="col">
                    <div class="card h-100 text-center p-3">
                        @if (optional($user->profile)->img)
                            <img src="{{ asset('storage/' . $user->profile->img) }}" class="rounded-circle mx-auto mb-3" style="width: 100px; height: 100px; object-fit: cover;" alt="Foto profilo di {{ $user->name }}">
                        @else
                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 100px; height: 100px; font-size:2rem;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        @endif

                            <h5 class="card-title">{{ $user->name }}</h5>
                            @if (optional($user->profile)->description)
                                <p class="card-text text-muted">{{ Str::limit($user->profile->description, 80) }}</p>
                            @endif

                            <a href="{{ route('users.show', $user) }}" class="btn btn-primary mt-auto">Vedi profilo</a>
                            
                        </div>
                    </div>
                @endforeach     
                </div>
            @endif


    
</x-layout>