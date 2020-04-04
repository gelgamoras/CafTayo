<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 200);
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->bigInteger('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')->references('id')->on('categories');
            $table->string('shortdescription', 256);
            $table->string('description', 256);
            $table->string('ingredients');
            $table->double('calories', 8, 2);
            $table->enum('isHalal', ['Halal', 'Haram']);
            $table->double('price', 8, 2);
            $table->bigInteger('campus_id')->unsigned();
            $table->foreign('campus_id')->references('id')->on('campuses');
            $table->string('coverphoto', 200)->nullable();
            $table->enum('isFeatured', ['Yes', 'No']);
            $table->enum('status', ['Active', 'Deleted']);
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
        Schema::dropIfExists('foods');
    }
}
