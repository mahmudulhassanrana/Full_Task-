<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AffiliatePayment extends Model
{
    protected $guarded = [];

    protected $table ="affiliate_payment";

    public function user_payment()
    {
        return $this ->hasMany(AffiliatePayment::class,'user_id','user_id');
    }
}
