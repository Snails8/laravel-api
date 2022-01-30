<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * お知らせ table
 * laravel では基本 migration名(複数系) => model名(単数形) にしないといけないが newsは news で通るよう作られている
 */
class CreateNewsTable extends Migration
{
    /**
     *
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('news_category_id')->unsigned();

            $table->string('title', 100)->default('')->comment('タイトル');
            $table->longText('body')->default('')->comment('内容');
            $table->dateTime('public_date')->comment('公開日');
            $table->string('image')->default('')->nullable()->comment('画像');
            $table->text('description')->default('')->comment('description');
            $table->boolean('is_public')->default(true)->comment('公開判定');
            $table->timestamps();

            // 外部キー制約
            $table->foreign('news_category_id')->references('id')->on('news_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
