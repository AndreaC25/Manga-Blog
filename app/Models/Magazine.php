<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use App\Models\Comic; // importazione del modello Comic

class Magazine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nationality',
    ];      

    public function comics()
    {
        return $this->hasMany(Comic::class); // una rivista ha molti manga
    }   

}