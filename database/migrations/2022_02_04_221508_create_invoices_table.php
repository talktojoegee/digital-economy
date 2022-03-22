<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('issued_by');
            $table->integer('invoice_no');
            $table->string('ref_no')->nullable();
            $table->dateTime('date_issued')->nullable();
            //$table->dateTime('due_date')->nullable();
            $table->double('total')->default(0);
            $table->double('sub_total')->default(0);
            $table->double('paid_amount')->default(0);
            $table->string('slug')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=unpaid,1=paid,2=verified,3=discarded'); //pending
            $table->integer('invoice_type')->default(1)->comment('1=new,2=expired,3=late{after 3mOfExpirtn}');
            $table->dateTime('date_paid')->nullable();
            #Posting
            $table->tinyInteger('officer_action')->default(0)->comment('0=no action,1=paid,2=verified,3=discarded');
            $table->unsignedBigInteger('officer_id')->nullable();
            $table->dateTime('date_actioned')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
