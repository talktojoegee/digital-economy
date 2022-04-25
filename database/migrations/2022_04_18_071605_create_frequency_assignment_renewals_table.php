<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrequencyAssignmentRenewalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequency_assignment_renewals', function (Blueprint $table) {
            /*amount:response.amount,
                        paymentReference:response.paymentReference,
                        transactionId:response.transactionId,
                        frequency:"{{$frequency->id}}",*/
            $table->id();
            $table->unsignedBigInteger('fa_id');
            $table->double('amount')->default(0);
            $table->string('ref_no')->nullable();
            $table->string('trx_id')->nullable();
            $table->date('valid_from');
            $table->date('valid_to');
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
        Schema::dropIfExists('frequency_assignment_renewals');
    }
}
