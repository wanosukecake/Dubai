<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->after('id', function ($table) {
                $table->foreignId('user_id')->constrained();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 外部キーを追加しているので、テーブルのインデックス削除してからでないと削除できない
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
