<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChurchPodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('church_podcasts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('church_id');
            $table->string('photo_url')->nullable();
            $table->string('podcast_title');
            $table->string('podcast_description');
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
        Schema::dropIfExists('church_podcasts');
    }
}
