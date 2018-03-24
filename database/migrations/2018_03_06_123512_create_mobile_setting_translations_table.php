<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileSettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_setting_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mobile_setting_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('locale')->index();
            $table->unique(['mobile_setting_id','locale']);
            $table->foreign('mobile_setting_id')->references('id')->on('mobile_settings')->onDelete('cascade');
            $table->softDeletes();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobile_setting_translations');
    }
}
