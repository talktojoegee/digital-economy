<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add3NewFieldsToRadioLicenseApplicationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('radio_license_application_details', function (Blueprint $table) {
            $table->integer('operation_mode')->nullable()->comment('1=Simplex,2=Duplex');
            $table->integer('frequency_band')->nullable()->comment('1=MF/HF,2=VHF,3=UHF,4=SHF');
            $table->string('other_category')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('radio_license_applications', function (Blueprint $table) {
            //
        });
    }
}
