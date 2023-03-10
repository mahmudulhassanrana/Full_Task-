<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    protected $guarded = [];

    protected $table ="user_payment";

    public function affiliate_payment()
    {
        return $this ->belongsTo(AffiliatePayment::class,'user_id','user_id');
    }
}
