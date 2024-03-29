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
            $table->bigIncrements('id');
            $table->unsignedbigInteger('role_id')->default(1);
            $table->unsignedbigInteger('join_squad_id')->nullable();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('paid_balance')->default(0);
            $table->integer('free_balance')->default(0);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign("role_id")
                ->references("id")
                ->on("user_roles");

            $table->foreign('join_squad_id')
                ->references('id')
                ->on('squads')
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
        Schema::dropIfExists('users');
    }
}
