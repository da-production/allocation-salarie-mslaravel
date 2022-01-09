<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_id', 'slug', 'intitule', 'type'
    ];

    public static function types($type = null)
    {
        $types = [
            1   => 'Inscription',
            2   => 'En cours de traitement',
        ];

        return is_null($type) ? $types : $types[$type];
    }
}
