<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
{
// Tutti gi utenti autenticati possono fare qusta richiesta
    public function authorize(): bool
    {
        return true;
    }

    // Regole di validazione per l'aggiornamento del fumetto
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255', //titolo obbligatorio, stringa, max 255 caratteri
            'number'=> 'required|integer|min:1', //numero obbligatorio, intero, minimo 1
            'year'=> 'required|digits:4|integer', //anno obbligatorio, 4 cifre, intero
            'plot'=> 'required|string', //trama obbligatoria, stringa
            'img'=> 'nullable|image|mimes:jpeg,jpg,gif|max:2048', //immagine opzionale, immagine, tipi consentiti, max 2048 KB
            'magazine_id'=> 'nullable|exists:magazines,id', //ID della rivista opzionale, deve esistere nella tabella magazines
            'categories'=> 'nullable|array', //categorie opzionali, array
            'categories.*'=> 'exists:categories,id', //ogni categoria deve esistere nella tabella categories
        ];
    }
}
