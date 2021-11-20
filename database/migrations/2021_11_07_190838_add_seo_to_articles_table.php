<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('seo_keywords')->after('published_at')->nullable();
            $table->string('seo_description')->after('seo_keywords')->nullable();
            $table->unsignedBigInteger('author_id')->after('seo_description')->nullable();
            $table->foreign('author_id')->references('id')->on('users');
            $table->dropForeign('articles_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
}
