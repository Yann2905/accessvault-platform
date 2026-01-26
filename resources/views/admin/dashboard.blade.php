@extends('layouts.app')

@section('content')
    <h1>Bienvenue {{ Auth::user()->nom }}</h1>
    <p>Rôle : {{ Auth::user()->role }}</p>

    <ul>
        <li><a href="#">Gestion des projets</a></li>
        <li><a href="#">Gestion des utilisateurs</a></li>
    </ul>
@endsection
