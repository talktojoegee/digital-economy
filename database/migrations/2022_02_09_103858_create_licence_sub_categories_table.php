<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenceSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licence_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lc_id');
            $table->string('sub_category');
            $table->tinyInteger('currency')->default(1)->comment('1=Local,2=Foreign');
            $table->double('exchange_rate')->default(1)->nullable();
            $table->string('lsc_remarks')->nullable();
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
        Schema::dropIfExists('licence_sub_categories');
    }
}
