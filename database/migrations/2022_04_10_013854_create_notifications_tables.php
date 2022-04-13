<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications_tables', function (Blueprint $table) {
            $table->id();
            $table->text('notification_text');
            $table->text('is_read')->default('0');
            $table->text('notification_to_which_user');
            $table->text('post_id');
            $table->text('status')->default('1');
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
        Schema::dropIfExists('notifications_tables');
    }
}
