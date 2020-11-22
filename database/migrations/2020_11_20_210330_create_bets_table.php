<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('user_id');
            $table->unsignedbigInteger('crash_id');
            $table->float('amount_bet');
            $table->float('user_crashed_at')->nullable();
            $table->timestamps();

            $table->foreign("user_id")
                ->references("id")
                ->on("users");

            $table->foreign("crash_id")
                ->references("id")
                ->on("crashes");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bets');
    }
}
