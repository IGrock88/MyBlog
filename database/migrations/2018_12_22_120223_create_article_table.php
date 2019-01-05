<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('preview', 255);
            $table->text('text', 255);
            $table->string('titleImage')->default('NULL')->nullable();
            $table->integer('authorId');
            $table->string('tags', 255)->default('NULL')->nullable();
            $table->integer('categoryId')->default(0)->nullable();
            $table->string('keywords', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->integer('views')->default(0);
            $table->enum('isShowOnMainHeader', ['0', '1'])->default('0');
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['title']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
