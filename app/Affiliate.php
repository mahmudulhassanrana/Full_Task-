<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Affiliate extends Authenticatable
{
    use Notifiable;

    protected $guard = 'affiliate';
    protected $table = 'affiliate';

    protected $fillable = [
        'name', 'email','promo_code','affiliate_ref_id', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
