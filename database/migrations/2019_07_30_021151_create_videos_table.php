<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->timestamp('published_at')->nullable();
            $table->char('channel_id', 200)->nullable();
            $table->char('thumbnail', 200)->nullable();
            $table->char('title', 200)->nullable();
            $table->text('description')->nullable();
            $table->char('channel_title', 200)->nullable();
            $table->char('playlist_id', 200)->nullable();
            $table->char('video_id', 50)->nullable();
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->integer('favorite')->default(0);
            $table->integer('comment')->default(0);
            $table->char('lang', 4)->default('en');
            $table->char('category', 50)->nullable();
            $table->char('publisher_name', 50)->nullable();
            $table->text('tags')->nullable();
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
        Schema::dropIfExists('videos');
    }
}
