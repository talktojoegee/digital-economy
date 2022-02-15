<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('posted_by');
            $table->string('job_title');
            $table->text('job_details');
            $table->integer('job_type_id');
            $table->integer('location_id')->nullable();
            $table->integer('department_id');
            $table->integer('job_role_id');
            $table->date('deadline')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=active,2=closed,3=discarded');
            $table->double('salary')->default(0)->nullable();
            $table->string('experience')->nullable()->comment('years of experience');
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
        Schema::dropIfExists('jobs');
    }
}
