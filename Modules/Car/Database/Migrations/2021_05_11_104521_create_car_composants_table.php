<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarComposantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_composants', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('composant_id');
           $table->foreign('composant_id')->references('id')->on('composants')->onDelete('cascade');
           $table->bigInteger('car_id');
           $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
           $table->bigInteger('create_use');
           $table->bigInteger('update_user');

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
        Schema::dropIfExists('car_composants');
    }
}
