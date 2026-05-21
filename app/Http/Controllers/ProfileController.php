<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest; 
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show()
    {
        $profile = auth()->user()->profile;
        return view('profiles.show', compact('profile'));    
    }

    public function edit ()
    {
        $profile = auth()->user()->profile;
        return view('profiles.edit', compact('profile'));    
    }

    public function update (UpdateProfileRequest $request)   
    {
       $data = $request->only(['tel','address', 'description']);

       if ($request->hasFile('img')) {
        $data['img'] = $request->file('img')->store('profiles', 'public'); //salva l'immagine nella cartella 'profiles' all'interno della cartella 'public'
       }

       auth()->user()->profile()->updateOrCreate(['user_id' => auth()->id()], $data); //aggiorna o crea il profilo dell'utente autenticato con i dati forniti   

            return redirect()->route('profile.show')->with('success', 'Profilo aggiornato correttamente.'); //reindirizza alla pagina del profilo con un messaggio di successo    

    }  

    
    




}
