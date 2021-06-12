<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->startingValue(0);
            $table->string('name')->unique();
            $table->unsignedInteger('parent_id')->index();
            
            $table->string('slug')->unique();
            $table->float('price' , 8 ,2);
            $table->string('image')->unique();
            $table->string('description')->default('');
            $table->timestamps();

            $table->foreign('parent_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
        });
        // DB::update("ALTER TABLE products AUTO_INCREMENT = 0;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
