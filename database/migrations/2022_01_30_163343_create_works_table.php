<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')     ->default('')->comment('事例タイトル');
            $table->string('image')     ->default('')->nullable()->comment('メイン画像');
            $table->text('introduction')->default('')->comment('導入部');

//            $table->string('h1')        ->nullable()->comment('見出し1');
//            $table->string('q1')        ->nullable()->comment('質問1');
//            $table->text('detail1')     ->nullable()->default('')->comment('見出し1の内容');
//            $table->string('h1')        ->nullable()->default('')->comment('見出し1');
//            $table->text('detail1')->nullable()->default('')->comment('見出し1の内容');
//            $table->string('h1')        ->nullable()->default('')->comment('見出し1');
//            $table->text('detail1')->nullable()->default('')->comment('見出し1の内容');
//            $table->string('h1')        ->nullable()->default('')->comment('見出し1');
//            $table->text('detail1')->nullable()->default('')->comment('見出し1の内容');
//            $table->string('h1')        ->nullable()->default('')->comment('見出し1');
//            $table->text('detail1')->nullable()->default('')->comment('見出し1の内容');

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
        Schema::dropIfExists('works');
    }
}
