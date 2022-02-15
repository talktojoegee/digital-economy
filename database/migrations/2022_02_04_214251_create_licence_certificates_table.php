<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenceCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licence_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('licence_app_id')->nullable()->comment('licence application ID');
            $table->unsignedBigInteger('licence_category')->nullable();
            $table->string('licence_no')->nullable();
            $table->dateTime('date_issued')->nullable();
            $table->dateTime('expires_on')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=active,2=expired,3=revoked');
            $table->string('ref_key')->nullable();
            $table->tinyInteger('collection_status')->default(0)->comment('0=not collected,1=collected');
            $table->string('attachment')->nullable();
            $table->integer('size')->nullable();
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
        Schema::dropIfExists('licence_certificates');
    }
}
