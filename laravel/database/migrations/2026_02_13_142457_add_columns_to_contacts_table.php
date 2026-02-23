<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
  {
    Schema::table('contacts', function (Blueprint $table) {
        $table->string('last_name')->after('name');
        $table->string('first_name')->after('last_name');
        $table->string('gender')->nullable();
        $table->string('tel')->nullable();
        $table->string('address')->nullable();
        $table->string('building')->nullable();
        $table->string('category')->nullable();
    });
  }

    /**
     * Reverse the migrations.
     */
    public function down()
  {
    Schema::table('contacts', function (Blueprint $table) {
        $table->dropColumn([
            'last_name',
            'first_name',
            'gender',
            'tel',
            'address',
            'building',
            'category'
        ]);
    });
  }
};
