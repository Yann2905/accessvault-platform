<?php

namespace App\Models;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'statut',
        'created_by',
        'updated_by'
        
    ];

    public function creator()
{
    return $this->belongsTo(Utilisateur::class, 'created_by');
}

public function updater()
{
    return $this->belongsTo(Utilisateur::class, 'updated_by');
}
// Relation Many-to-Many avec Utilisateur
public function utilisateurs(): BelongsToMany
{
    return $this->belongsToMany(Utilisateur::class, 'utilisateur_projet', 'projet_id', 'utilisateur_id');
}

public function acces()
{
    return $this->hasMany(Acces::class);
}

}
