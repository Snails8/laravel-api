<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkWorkTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_work_tag', function (Blueprint $table) {
            // 主キーは複合主キーでもいいかも
            $table->bigIncrements('id');
            // 複合主キーを定義
//            $table->primary(['work_id','work_tag_id']);

            // カラム
            $table->bigInteger('work_id')->unsigned();
            $table->bigInteger('work_tag_id')->unsigned();
//            $table->unsignedBigInteger('work_id');    // やっていることは同じ
//            $table->unsignedBigInteger('tag_id');

            // 指定したカラムに外部キー制約を定義
//            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');
//            $table->foreign('work_tag_id')->references('id')->on('work_tags')->onDelete('cascade');

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
        Schema::dropIfExists('work_work_tag');
    }
}
