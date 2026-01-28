<?php

namespace App\Models;
use App\Models\Projet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_fichier',
        'chemin_fichier',
        'type_fichier',
        'icon_fichier',
        'projet_id'
        
    ];

}
