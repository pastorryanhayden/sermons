<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSermonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sermons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('church_id');
            $table->string('title');
            $table->unsignedBigInteger('speaker_id')->nullable();
            $table->unsignedBigInteger('series_id')->nullable();
            $table->string('service')->nullable();
            $table->text('manuscript')->nullable();
            $table->mediumText('short_description')->nullable();
            $table->string('mp3')->nullable();
            $table->string('slides')->nullable();
            $table->string('handout')->nullable();
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
        Schema::dropIfExists('sermons');
    }
}
