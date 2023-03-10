<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('affiliate_id');
            $table->string('Sub_affiliate_id')->nullable();
            $table->string('affiliate_account');
            $table->string('Sub_affiliate_account')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affiliate_payment');
    }
}
