<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToCompanyDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_directors', function (Blueprint $table) {
            $table->tinyInteger('status')->default(1)->comment('1=active,0=inactive');
            $table->tinyInteger('birth_month')->nullable();
            $table->tinyInteger('birth_year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_directors', function (Blueprint $table) {
            //
        });
    }
}
