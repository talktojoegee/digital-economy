<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('document')->nullable();
            $table->tinyInteger('document_type')->nullable();
            /*$table->string('cert_incorporation')->nullable();
            $table->string('cert_memorandum')->nullable();
            $table->string('cert_part_directors')->nullable();*/
            $table->tinyInteger('status')->default(0)->comment('0=pending,1=approved,2=discarded');
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
        Schema::dropIfExists('company_documents');
    }
}
