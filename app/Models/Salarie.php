<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salarie extends Model
{
    use HasFactory;

    public function getDateFormat()
    {
        if (config('database.default') == 'sqlsrv') return 'Y-d-m H:i:s.v';
        return 'Y-m-d H:i:s';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code_employeur', 'code_agence', 'code_commune', 'matricule', 'num_assurance',
        'nom_fr', 'prenom_fr', 'nom_ar', 'prenom_ar',
        'date_naissance', 'lieu_naissance', 'adresse_fr', 'adresse_ar',
        'email', 'tel_mobile_1', 'tel_mobile_2', 'fix',
    ];


    public function suspenssion()
    {
        return $this->hasOne(Demande::class)->where([
            ['salarie_id', auth()->user()->id],
            ['motif', NULL],
            ['type_demande', 1]
        ]);
    }

    public function supperssion()
    {
        return $this->hasOne(Demande::class)->where([
            ['salarie_id', auth()->user()->id],
            ['motif', NULL],
            ['type_demande', 2]
        ]);
    }
}
