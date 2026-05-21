<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comic; // importazione del modello Comic

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function comics()
    {
        return $this->belongsToMany(Comic::class); // una categoria appartiene a molti manga e un manga appartiene a molte categorie
    }
}