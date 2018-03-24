<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressSettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_setting_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('address_setting_id')->unsigned();
            $table->string('address')->nullable();
            $table->string('label')->nullable();            
            $table->string('locale')->index();
            $table->unique(['address_setting_id','locale']);
            $table->foreign('address_setting_id')->references('id')->on('address_settings')->onDelete('cascade');
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
        Schema::dropIfExists('address_settings_translations');
    }
}
