<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = ['code_demande', 'salarie_id', 'type_demande', 'date_supression'];

    public static function displayTypes($type = null)
    {

        $types = [
            1 => 'Suspenssion',
            2 => 'Supression'
        ];
        return is_null($type) ? $types : $types[$type];
    }

    public static function types($type = null)
    {

        $types = self::displayTypes();
        $demandesType = Demande::whereNull('decision')
            ->where([
                ['salarie_id', auth()->user()->id]
            ])->pluck('type_demande')->toArray();
        if (!is_null($demandesType)) {
            foreach ($demandesType as $t) {
                unset($types[$t]);
            }
        }
        return is_null($type) ? $types : $types[$type];
    }



    public function suspenssion()
    {
        return $this->hasOne(Suspenssion::class)->latest();
    }
}
