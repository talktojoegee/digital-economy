<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessageStatusColumnToMessageCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('message_customers', function (Blueprint $table) {
            $table->tinyInteger('message_status')->default(0)->comment('0=Open,1=Close');
            $table->unsignedBigInteger('status_updated_by')->nullable();
            $table->date('date_updated')->nullable();
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
