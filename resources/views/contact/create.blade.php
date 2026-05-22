<x-layout>
    <x-slot name="title">Contatti</x-slot>  

    <div class="row justify-content-center">
        <div class="col-md-7">
            <h1 class="mb-4">Contatti</h1>
            
            
            
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name"  class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"> @error('name')
                    <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>    
                    <div class="mb-3">  
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" >
                        @error('email')
                        
                        <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>
                        
                        <div class="mb-4">
                            <label for="message" class="form-label">Messaggio</label>
                            <textarea name="message" id="message" rows="6" class="form-control @error('message') is-invalid @enderror"> {{ old('message') }}</textarea>
                            @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                            
                            <button type="submit" class="btn btn-primary">Invia messaggio</button>
                                    
                        
                    
                    
                    
                </form>
            
            </div>
    </div>        
        </x-layout>