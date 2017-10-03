<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('user_employee');
            $table->boolean('user_web_admin');
            $table->boolean('user_quote_edit');
            $table->boolean('user_quote_view');
            $table->boolean('user_job_edit');
            $table->boolean('user_job_view');
            $table->boolean('user_invoice_edit');
            $table->boolean('user_invoice_view');
            $table->boolean('user_reciept_add');
            $table->boolean('user_reciept_view');
            $table->boolean('user_schedule_edit');
            $table->boolean('user_schedule_view');
            $table->boolean('user_created_by');
            $table->boolean('user_modified_by');
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
