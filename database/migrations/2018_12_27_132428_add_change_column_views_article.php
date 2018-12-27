<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChangeColumnViewsArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article', function ($table){
            $table->integer('views')->default(0);
            $table->enum('isShowOnMainHeader', ['0', '1']);;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article', function ($table){
            $table->dropColumn('views');
            $table->dropColumn('isShowOnMainHeader');
        });
    }
}
