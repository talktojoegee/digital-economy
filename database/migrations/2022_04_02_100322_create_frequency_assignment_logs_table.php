<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrequencyAssignmentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequency_assignment_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fa_id')->comment('frequency assignment ID');
            $table->unsignedBigInteger('logged_by')->comment('officer ID');
            $table->string('subject')->nullable();
            $table->string('narration')->nullable();
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
        Schema::dropIfExists('frequency_assignment_logs');
    }
}
