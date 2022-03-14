<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkflowProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflow_processes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('post_id')->comment('request_id');
            $table->unsignedBigInteger('officer_id')->comment('person to act on request');
            $table->tinyInteger('is_seen')->default(0)->comment('1=seen,0=unseen');
            $table->tinyInteger('status')->default(0)->comment('1=approved,0=pending,2=declined');
            $table->tinyInteger('type')->default(1)->comment('1=new,2=renewal');
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
        Schema::dropIfExists('workflow_processes');
    }
}
