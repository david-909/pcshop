<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('username', 45);
            $table->string('password', 45);
            $table->string('email', 150)->unique('email_UNIQUE');
            $table->string('name', 45);
            $table->string('surname', 45);
            $table->string('phone', 25);
            $table->string('address', 100);
            $table->integer('role_id')->index('fk_users_roles1_idx');
            $table->integer('city_id')->index('fk_users_cities1_idx');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
