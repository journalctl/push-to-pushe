<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePushToPusheIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_to_pushe_ids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id', false, true)->nullable();
            $table->string('pushe_id', 45)->index();
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
        Schema::drop('push_to_pushe_ids');
    }
}
