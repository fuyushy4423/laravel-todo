<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $todos = [];
        for ($i = 1; $i <= 5; $i++) {
          array_push($todos, ['taskname' => "タスク-{$i}"]);
        }
        \Illuminate\Support\Facades\DB::table('todos')->insert($todos);
      }
}
