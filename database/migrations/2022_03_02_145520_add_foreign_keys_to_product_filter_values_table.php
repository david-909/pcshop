<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductFilterValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_filter_values', function (Blueprint $table) {
            $table->foreign(['filter_value_id'], 'fk_filter_products_filter_values1')->references(['id'])->on('filter_values')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['product_id'], 'fk_filter_products_products1')->references(['id'])->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_filter_values', function (Blueprint $table) {
            $table->dropForeign('fk_filter_products_filter_values1');
            $table->dropForeign('fk_filter_products_products1');
        });
    }
}
