<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToWorkstationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workstations', function (Blueprint $table) {
            $table->string('station_class')->nullable();
            $table->integer('operation_schedule')->default(1)->comment('1=day,2=night,3=both');
            $table->string('nature_of_frequency')->nullable();
            $table->string('transmitter_location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workstations', function (Blueprint $table) {
            //
        });
    }
}
