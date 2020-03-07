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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('colour_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->integer('stock')->default(0);
            $table->timestamps();

            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreign('colour_id')->references('id')->on('colours')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');

        });
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
