<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessageTypeColumnToMessageCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('message_customers', function (Blueprint $table) {
            $table->tinyInteger('message_type')->default(1)->comment('1=fromAdmin,2=fromCustomer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('message_customer', function (Blueprint $table) {
            //
        });
    }
}
