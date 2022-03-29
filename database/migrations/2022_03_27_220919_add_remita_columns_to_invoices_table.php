<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemitaColumnsToInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('rrr')->nullable();
            $table->double('r_amount')->nullable();
            $table->string('r_order_id')->nullable();
            $table->string('r_message')->nullable();
            $table->dateTime('r_payment_date')->nullable();
            $table->dateTime('r_transaction_time')->nullable();
            $table->string('r_status')->nullable();

            $table->string('r_verified_by')->nullable();
            $table->string('r_date_verified')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
        });
    }
}
