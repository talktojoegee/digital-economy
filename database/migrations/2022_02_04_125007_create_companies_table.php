<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) { //companies or operators table
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('ceo_name')->nullable();
            $table->string('office_address')->nullable();
            $table->integer('state')->nullable();
            $table->integer('lga')->nullable();
            $table->string('email')->unique();
            $table->string('password')->unique();
            $table->string('mobile_no')->nullable();
            $table->string('logo')->nullable();
            $table->string('rc_number')->unique()->nullable();
            $table->date('incorporation_year')->nullable();
            $table->integer('company_type')->nullable();
            $table->integer('ownership')->nullable();
            $table->integer('ownership_gender')->nullable();
            $table->integer('no_employees')->nullable();
            $table->integer('license_status')->default(0)->comment('0=NoLicence,1=active,2=inactive,3=expired');
            $table->dateTime('licence_start')->nullable();
            $table->dateTime('licence_expires_at')->nullable();
            $table->string('active_key')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
