<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->double('lat', 20, 15)->nullable();	        
            $table->double('lng', 20, 15)->nullable();
            $table->integer('setting_id')->nullable()->unsigned();
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
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
        Schema::dropIfExists('address_settings');
    }
}
