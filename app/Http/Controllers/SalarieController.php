<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Salarie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SalarieController extends Controller
{


    public function inscription2()
    {
        return view('salarie.inscriptions.etape2');
    }

    public function profile()
    {
        $demandes = Demande::where([
            ['salarie_id', auth()->user()->id],
            ['motif', NULL]
        ])->get();
        // dd($demandes);
        return view('salarie.profile.index', compact(['demandes']));
    }

    public function store(Request $request)
    {
        // remigrate the salarie table error with prenom => preniom

        $auth = auth()->user();
        $salarie = Salarie::create([
            'matricule'      => Str::uuid(),
            'num_assurance' => '123456789123',
            'code_employeur' => $auth->code_employeur,
            'code_agence' => "16000",
            'code_commune' => "16000",
            'nom_fr' => $auth->nom,
            'prenom_fr' => $auth->prenom,
            'nom_ar' => $request->nom_ar,
            'prenom_ar' => $request->prenom_ar,
            'date_naissance' => $request->date_naissance,
            'lieu_naissance' => $request->lieu_naissance,
            'adresse_fr' => $request->adresse_fr,
            'adresse_ar' => $request->adresse_ar,
            'email' => $request->email,
            'tel_mobile_1' => $request->tel_mobile_1,
            'tel_mobile_2' => $request->tel_mobile_2,
            'date_debut_allocation' => $request->fix,
            'date_fin_allocation' => $request->fix,
            'duree_allocation' => $request->fix,
        ]);
        if ($salarie) return redirect(route('salarie.profile'))->with('success', "good");
        return back()->with('error', "oh WTF");
    }

    public function updateProfile(Request $request)
    {
        $salarie = Salarie::where('code_employeur', auth()->user()->code_employeur)->first();
        $user   = User::where('code_employeur', auth()->user()->code_employeur)->first();
        DB::transaction(function () use ($salarie, $user, $request) {
            if ($request->filled('nom')) {
                $salarie->nom_fr = $request->nom;
                $user->nom = $request->nom;
            }
            if ($request->filled('prenom')) {
                $salarie->prenom_fr = $request->prenom;
                $user->prenom = $request->prenom;
            }
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }
            $salarie->save();
            $user->save();
            return true;
        });
        return back();
    }

    public function update(Request $request)
    {
        $auth = auth()->user();
        $salarie = Salarie::where('code_employeur', $auth->code_employeur)->first();
        $salarie->adresse_fr    = $request->adresse_fr;
        $salarie->adresse_ar    = $request->adresse_ar;
        $salarie->email         = $request->email;
        $salarie->tel_mobile_1  = $request->tel_mobile_1;
        $salarie->tel_mobile_2  = $request->tel_mobile_2;
        $salarie->fix           = $request->fix;
        $salarie->save();
        return back()->with('success', "salarie a été mise à jour");
    }
}
