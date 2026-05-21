<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // importazione del modello User

class Profile extends Model
{
    use HasFactory;

    //Colonne che possono essere assegnate in massa


    protected $fillable = [
        'tel',
        'address',
        'img',
        'description',
        'user_id',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class); // un profilo appartiene a un utente
    }
}