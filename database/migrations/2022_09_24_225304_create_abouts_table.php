<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('vision')->nullable(true);
            $table->text('vision_details')->nullable(true);
            $table->string('objectives')->nullable(true);
            $table->text('objectives_details')->nullable(true);
            $table->string('Aboutus')->nullable(true);
            $table->text('Aboutus_details')->nullable(true);
            $table->tinyInteger("statuse")->default(1);
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
        Schema::dropIfExists('abouts');
    }
}
