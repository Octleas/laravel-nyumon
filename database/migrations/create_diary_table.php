<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('diaries', function (Blueprint $table) {
            $table->id();                // 主キー
            $table->date('date');        // 日付
            $table->string('title');     // タイトル
            $table->text('body');        // 内容
            $table->timestamps();        // created_at と updated_at を追加
        });
    }

    public function down()
    {
        Schema::dropIfExists('diaries'); // テーブルを削除
    }
};