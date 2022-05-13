<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('quantity');
            $table->integer('order_id')->index('fk_order_products_order1_idx');
            $table->integer('product_id')->index('fk_order_products_products1_idx');
            $table->timestamp('created_at');
            $table->decimal('price', 10);
            $table->string('product', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
