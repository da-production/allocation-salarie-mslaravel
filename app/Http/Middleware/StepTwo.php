<?php

namespace App\Http\Middleware;

use App\Models\Salarie;
use Closure;
use Illuminate\Http\Request;

class StepTwo
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

        $salarie = Salarie::where('code_employeur', auth()->user()->code_employeur)->first();
        if ($salarie) return $next($request);
        return redirect(route('inscription.etape2'));
    }
}
