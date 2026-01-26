<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Force la langue française de manière agressive
        App::setLocale('fr');
        Config::set('app.locale', 'fr');
        Config::set('app.fallback_locale', 'fr');
        
        // Force aussi la langue pour les validations
        \Illuminate\Support\Facades\Lang::setLocale('fr');
        
        return $next($request);
    }
}
