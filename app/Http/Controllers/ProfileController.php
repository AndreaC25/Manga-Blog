<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function update (Request $request)   
    {
       $request->validate([
        'tel' => 'required|string|unique:profiles,tel,' . optional(auth()->user()->profile)->id,    //telefono obbligatorio, stringa, unico nella tabella profiles, esclude l'utente attuale
        'address' => 'nullable|string|max:255', //indirizzo opzionale, stringa, max 255 caratteri
        'description' => 'nullable|string', //descrizione opzionale, stringa
        'img' => 'nullable|image|mimes:jpeg,jpg,gif|max:2048', //immagine opzionale, immagine, tipi consentiti, max 2048 KB 

            ]);

            $data = $request->only(['tel', 'address', 'description']);  

            if ($request->hasFile('img')) {    
                $data['img'] = $request->file('img')->store('profiles', 'public'); //salva l'immagine nella cartella profiles del disco public
            }   

            auth()->user()->profile()->updateOrCreate( //aggiorna o crea il profilo dell'utente autenticato
        ['user_id' => auth()->id()], //condizione per trovare il profilo, se non esiste lo crea
        $data //dati da aggiornare o creare
        );

            return redirect()->route('profile.show')->with('success', 'Profilo aggiornato correttamente.'); //reindirizza alla pagina del profilo con un messaggio di successo    

    }  

    
    




}
