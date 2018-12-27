<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsKeywordAndDescriptonArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article', function ($table){
            $table->string('keywords')->default('NULL')->nullable();
            $table->string('description')->default('NULL')->nullable();

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
            $table->dropColumn('keywords');
            $table->dropColumn('description');
        });
    }
}
