<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
           
            $table->bigInteger('id')->primary();

            $table->string('title',255)->nullable();
            $table->string('slug');
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->integer('banner_image_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->string('address')->nullable();
            $table->string('map_lat')->nullable();
            $table->string('map_lng')->nullable();
            $table->integer('map_zoom')->nullable();
            $table->tinyInteger('is_featured')->nullable();
            $table->string('gallery')->nullable();

            $table->tinyInteger('number')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('sale_price')->nullable();
            $table->tinyInteger('is_instant')->nullable();

            $table->tinyInteger('enable_extra_price')->nullable();
            $table->text('extra_price')->nullable();
           
            $table->tinyInteger('door')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('default_state')->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->tinyInteger('timestamp')->nullable();
            $table->text('service_fee')->nullable();

            $table->string('vedio')->nullable();
            $table->tinyInteger('passenger')->nullable();
            
            $table->string('gear')->nullable();
            $table->tinyInteger('baggage')->nullable();
            
         
            
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
        Schema::dropIfExists('cars');
    }
}
