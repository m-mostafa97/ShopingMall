<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('setting_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('copyright')->nullable();
            $table->string('counter_description')->nullable();
            $table->string('text_logo')->nullable();            
            $table->string('locale')->index();
            $table->unique(['setting_id','locale']);
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
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
        Schema::dropIfExists('setting_translations');
    }
}
