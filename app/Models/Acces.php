<?php

namespace App\Models;
use App\Models\Projet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Acces extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'url',
        'email',
        'mot_de_passe',
        'environnement_id',
        'projet_id'
        
    ];

    public function environnement()
{
    return $this->belongsTo(Environnement::class, 'environnement_id');
}


}
