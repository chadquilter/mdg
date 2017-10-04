<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('job_id');
	        $table->bigInteger('job_type');
	        $table->mediumText('job_title');
	        $table->longText('job_summary');
	        $table->longText('job_notes');
	        $table->boolean('job_media');
	        $table->boolean('job_display');
	        $table->boolean('job_account');
	        $table->boolean('job_address');
	        $table->boolean('job_certs');
	        $table->boolean('job_quote');
	        $table->boolean('job_reciepts');
	        $table->boolean('job_invoiced');
	        $table->bigInteger('job_status');
	        $table->bigInteger('job_created_by');
            $table->bigInteger('job_modified_by');
            $table->Integer('user_id');
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
