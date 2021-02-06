<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubredditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subreddits', function (Blueprint $table) {
            $table->string('name');
            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');
            $table->integer('subscribers')->default(0);
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->json('rules')->nullable();
            $table->timestamps();

            $table->primary('name', 'subreddit_name');
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subreddits');
    }
}
