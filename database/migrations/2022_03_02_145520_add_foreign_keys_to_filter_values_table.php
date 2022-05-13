<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFilterValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filter_values', function (Blueprint $table) {
            $table->foreign(['filter_id'], 'fk_vrednost_filtera_filters1')->references(['id'])->on('filters')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filter_values', function (Blueprint $table) {
            $table->dropForeign('fk_vrednost_filtera_filters1');
        });
    }
}
