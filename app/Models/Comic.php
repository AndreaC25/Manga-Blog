<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;     
use App\Models\User; // importazione del modello User
use App\Models\Magazine; // importazione del modello Magazine
use App\Models\Category; // importazione del modello Category

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'number',
        'year',
        'plot',
        'img',
        'magazine_id',
        'user_id',
    ];      

    public function magazine()
    {
        return $this->belongsTo(Magazine::class); // un manga appartiene a una rivista
    }   

    public function user()
    {
        return $this->belongsTo(User::class); // un manga appartiene a un utente
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class); // un manga appartiene a molte categorie e una categoria appartiene a molti manga
    }
}