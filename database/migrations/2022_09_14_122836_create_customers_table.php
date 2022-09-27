<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique(true);
            $table->string('email')->unique(true);
            $table->string('image');
            $table->string('adress');
            $table->tinyInteger('gender');
            $table->tinyInteger('status')->default(1);
            $table->string('verify_code')->nullable();
            $table->string('verify_status')->nullable();
            $table->string('verify_expire');
            $table->double('lat')->nullable();
            $table->double('log')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
