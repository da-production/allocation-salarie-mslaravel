<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // public function getDateFormat()
    // {
    //     return 'Y-d-m H:i:s.v';
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code_wilaya', 'code_employeur', 'email',
        'nom', 'Expired', 'Expired_at', 'guide',
        'prenom', 'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function salarie()
    {
        return $this->hasOne(Salarie::class, 'code_employeur', 'code_employeur');
    }

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class, 'code_wilaya', 'code');
    }
}
