<?php

namespace App\Http\Middleware;

use App\Models\Salarie;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscriptionEtapeDeux
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) return redirect(route('connexion'));

        $salarie = Salarie::where('code_employeur', auth()->user()->code_employeur)->first();
        if ($salarie) return redirect(route('salarie.profile'));
        return $next($request);
    }
}
