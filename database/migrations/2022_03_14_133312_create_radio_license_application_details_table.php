<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadioLicenseApplicationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radio_license_application_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('radio_la_id')->comment('radio license application ID');
            $table->integer('lc_id')->nullable()->comment('license category ID');
            $table->integer('workstation_id')->nullable();
            $table->integer('type_of_device')->nullable()->comment('1=handheld,2=base,3=repeaters,4=vehicular');
            $table->integer('no_of_devices')->nullable();
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
        Schema::dropIfExists('radio_license_application_details');
    }
}
