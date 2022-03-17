<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadioLicenseApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radio_license_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->text('purpose')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=Received,1=Acknowledge,2=Processing,3=Discarded,4=Approved/Closed');
            $table->bigInteger('actioned_by')->nullable()->comment('final approval/declined');
            $table->date('date_actioned')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('radio_license_applications');
    }
}
