<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAppDefaultSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_default_settings', function (Blueprint $table) {
            $table->string('new_licence_sms')->nullable()->comment('sms message that will be sent for new applications');
            $table->integer('sms_type')->default(1)->comment('1=new licence,2=renewal reminder,3=renewal acknowledgement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_default_settings', function (Blueprint $table) {
            //
        });
    }
}
