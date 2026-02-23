<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
   {
    Schema::table('contacts', function (Blueprint $table) {
        // ① 文字列のcategoryを削除
        $table->dropColumn('category');

        // ② category_idを追加（外部キー）
        $table->foreignId('category_id')
              ->constrained()
              ->onDelete('cascade');
    });
   }

   public function down(): void
   {
    Schema::table('contacts', function (Blueprint $table) {
        // 元に戻す処理
        $table->dropForeign(['category_id']);
        $table->dropColumn('category_id');

        $table->string('category')->nullable();
    });
   }
/**
     * Run the migrations.
     */
};
