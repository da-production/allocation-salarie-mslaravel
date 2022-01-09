<?php

namespace App\Http\Controllers;

use App\Http\Requests\Demande\StoreNewReqquest;
use App\Models\Demande;
use App\Models\Notification;
use App\Models\Suspenssion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DemandeController extends Controller
{

    public function store(StoreNewReqquest $request)
    {
        //
        // dd($request->all());
        if ($request->type_demande == 2) {
            // date_supression
            $demande = Demande::create([
                'salarie_id'        => auth()->user()->id,
                'code_demande'      => Str::uuid(),
                'type_demande'      => 2,
                'date_supperssion'  => $request->date_supperssion,
            ]);
            return back()->with('success', "votre demande a été créée avec succès");
            // return back()->with('error', "tzid touchi fi script nga3rak");
        }
        if ($request->type_demande == 1) {

            DB::transaction(function () use ($request) {
                $demande = Demande::create([
                    'salarie_id'    => auth()->user()->id,
                    'code_demande'  => Str::uuid(),
                    'type_demande'  => $request->type_demande,
                ]);
                Notification::create([
                    'demande_id'    => $demande->id,
                    'type'          => 1,
                    'intitule'      => Notification::types(1),
                    'slug'          => Str::slug(Notification::types(1)),
                ]);
                Suspenssion::create([
                    'demande_id'    => $demande->id,
                    'date_debut'    => Date('Y-m-d'),
                    'date_fin'      => $request->date_fin,
                ]);
            });
            return back()->with('success', "votre demande a été créée avec succès");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        //
        $demande = Demande::with('suspenssion')->where('code_demande', $code)->first();
        return view('salarie.demande.show', compact(['demande']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
