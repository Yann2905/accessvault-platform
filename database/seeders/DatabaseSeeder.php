<?php

namespace Database\Seeders;

//use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
      
        if (!Utilisateur::where('email', 'admin@test.com')->exists()) {
        Utilisateur::create([
            'nom' => 'Admin',
            'email' => 'admin@test.com',
            'mot_de_passe' => Hash::make('admin123'),
            'role' => 'admin'
        ]);
    };
       
        if (!Utilisateur::where('email', 'test@test.com')->exists()) {
        Utilisateur::create([
            'nom' => 'Test User',
            'email' => 'test@test.com',
            'mot_de_passe' => Hash::make('test123'),
            'role' => 'utilisateur'
        ]);
    };
    }
}
