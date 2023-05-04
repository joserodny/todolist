<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class TodoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,20) as $value){
            DB::table('todo_lists')->insert([
                'task' => $faker->name,
                'status_id' => $faker->randomElement([1,2]),
            ]);
        }
    }
}
