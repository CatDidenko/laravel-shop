<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title')->unique();
            $table->text('content');
            $table->decimal('price', 8, 2);
            $table->string('image');
            $table->string('slug')->default('');
            $table->integer('count')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->double('weight')->nullable();
            $table->enum('status', ['PROMO', 'ORDINARY'])->default('ORDINARY');
            $table->integer('category_id')->unsigned()->index();
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
        Schema::drop('products');
    }
}
