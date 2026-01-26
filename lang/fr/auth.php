<?php

return [
    'failed' => 'Ces identifiants ne correspondent pas à nos enregistrements.',
    'password' => 'Le mot de passe fourni est incorrect.',
    'throttle' => 'Trop de tentatives de connexion. Veuillez réessayer dans :seconds secondes.',
    
    // Messages de validation personnalisés
    'validation' => [
        'required' => 'Le champ :attribute est obligatoire.',
        'email' => 'Le champ :attribute doit être une adresse email valide.',
        'min' => [
            'string' => 'Le champ :attribute doit contenir au moins :min caractères.',
        ],
        'confirmed' => 'La confirmation du champ :attribute ne correspond pas.',
        'unique' => 'La valeur du champ :attribute est déjà utilisée.',
    ],
    
    // Attributs personnalisés
    'attributes' => [
        'nom' => 'nom',
        'email' => 'email',
        'password' => 'mot de passe',
        'password_confirmation' => 'confirmation du mot de passe',
        'role' => 'rôle',
    ],
];


