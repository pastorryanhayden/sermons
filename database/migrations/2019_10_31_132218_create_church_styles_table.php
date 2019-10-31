<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChurchStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('church_styles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('church_id');
            $table->string('font_link')->nullable();
            $table->string('font_name')->nullable();
            $table->string('text_color')->nullable();
            $table->string('accent_color')->nullable();
            $table->string('rounding_style')->nullable();
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
        Schema::dropIfExists('church_styles');
    }
}
