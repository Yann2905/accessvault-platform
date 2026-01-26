<?php

namespace App\Models;
use App\Models\Acces;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environnement extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'couleur',
    ];

    public function acces()
{
    return $this->hasMany(Acces::class,'environnement_id');
}

}
