<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check(); //solo gli utenti autenticati possono aggiornare il profilo 

    }

    public function rules(): array
    {

        $profileId = optional(auth()->user()->profile_id)->id;      

        return [
            'tel' => "required|string|unique:profiles,tel,{$profileId}", //il numero di telefono deve essere unico nella tabella profiles, ma esclude il profilo corrente
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //l'immagine deve essere un file di tipo immagine con estensione jpeg, png, jpg, gif o svg e non deve superare i 2048 KB

        ];
    }
}
