<?php
namespace App\Models;
use App\Models\projet;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Hash;

class Utilisateur extends Authenticatable
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id';
    public $timestamps = true;

    //  On utilise bien les bons noms de colonnes réels
    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'mot_de_passe',
        'role',
        'avatar',
    ];

    // On cache le mot de passe dans les exports JSON
    protected $hidden = [
        'mot_de_passe',
    ];

    // Cette méthode dit à Laravel que le mot de passe s'appelle "mot_de_passe"
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    //  Relation Many-to-Many avec les projets
    public function projets(): BelongsToMany
    {
        return $this->belongsToMany(Projet::class, 'utilisateur_projet', 'utilisateur_id', 'projet_id');
    }

    //  Méthode pratique pour créer un utilisateur proprement
    public static function creer(array $data)
    {
        $data['mot_de_passe'] = Hash::make($data['mot_de_passe']);
        return self::create($data);
    }


}


