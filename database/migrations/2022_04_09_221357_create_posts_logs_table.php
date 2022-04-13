<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_logs', function (Blueprint $table) {
            $table->id();
            $table->string('posted_by_user_id');
            $table->string('original_post_id');
            $table->string('title');
            $table->text('content');
            $table->text('tags');
            $table->string('status')->default('1'); //1 active //0 inactive
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
        Schema::dropIfExists('posts_logs');
    }
}
