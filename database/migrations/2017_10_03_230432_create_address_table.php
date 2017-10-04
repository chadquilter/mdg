<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('title');
            $table->longText('notes');
            $table->longText('address_1');
            $table->longText('address_2');
            $table->longText('city');
            $table->longText('state');
            $table->longText('zip');
            $table->longText('country');
            $table->Integer('created_by');
            $table->Integer('modified_by');
            $table->boolean('active');
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
        Schema::dropIfExists('address');
    }
}
