<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCategoryFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_filters', function (Blueprint $table) {
            $table->foreign(['category_id'], 'fk_category_filters_categories1')->references(['id'])->on('categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['filter_id'], 'fk_category_filters_filters1')->references(['id'])->on('filters')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_filters', function (Blueprint $table) {
            $table->dropForeign('fk_category_filters_categories1');
            $table->dropForeign('fk_category_filters_filters1');
        });
    }
}
