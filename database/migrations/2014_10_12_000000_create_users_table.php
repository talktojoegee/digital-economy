<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('other_names')->nullable();
            $table->string('email')->unique();
            $table->tinyInteger('verified')->default(0)->comment('0=unverified; 1=verified');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile_no')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('local_gov_id')->nullable();
            $table->date('birth_date')->nullable();
            $table->date('hire_date')->nullable();
            $table->date('confirm_date')->nullable();
            $table->integer('job_role_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->tinyInteger('account_status')->default(1)->comment('1=active; 2=inactive;3=suspended');
            $table->string('avatar')->default('avatar.png')->nullable();
            $table->string('address')->nullable();
            $table->string('username')->nullable();
            $table->text('about_me')->nullable();
            $table->tinyInteger('gender')->default(1)->comment('1=male;2=female');
            $table->integer('grade_level_id')->nullable();
            $table->integer('marital_status')->default(1)->nullable();
            $table->string('employee_id')->nullable();
            $table->string('slug')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
