<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTaskdetailToTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // このマイグレーションは既に存在するカラムを追加しようとしているため、テーブルに `taskdetail` カラムが存在しないことを確認します。
        Schema::table('todos', function (Blueprint $table) {
            if (!Schema::hasColumn('todos', 'taskdetail')) {
                $table->text('taskdetail')->nullable()->after('taskname');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->dropColumn('taskdetail');
        });
    }
}
