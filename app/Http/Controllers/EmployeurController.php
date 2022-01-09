<?php

namespace App\Http\Controllers;

use App\Models\Employeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeurController extends Controller
{
    public function code_employeur(Request $request)
    {
        $response = Http::post('https://teledeclaration.cnas.dz/srv/cnas/cotisant/cnac/'.$request->code.'?usr=cnac&pwd=FD@85_GKwsD01');
        return $response->json();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employeur  $employeur
     * @return \Illuminate\Http\Response
     */
    public function show(Employeur $employeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employeur  $employeur
     * @return \Illuminate\Http\Response
     */
    public function edit(Employeur $employeur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employeur  $employeur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employeur $employeur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employeur  $employeur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employeur $employeur)
    {
        //
    }
}
