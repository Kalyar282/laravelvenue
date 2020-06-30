<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('deposit');
            $table->string('discount');
            $table->string('description');
            $table->text('photo');
            
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('calendar_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('subcategory_id')
            ->references('id')->on('subcategories')
            ->onDelete('cascade');

            $table->foreign('location_id')
            ->references('id')->on('locations')
            ->onDelete('cascade');

        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
