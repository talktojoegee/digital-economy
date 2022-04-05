<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignFrequencyQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_frequency_queues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('invoice_slug');
            $table->integer('queue_type')->default(1)->comment('1=new freq, 2=renew');
            $table->integer('status')->default(0)->comment('0=pending,1=assigned,2=discarded');
            $table->integer('type_of_device')->nullable()->comment('1=handheld,2=base,3=repeaters,4=vehicular');
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
        Schema::dropIfExists('assign_frequency_queues');
    }
}
