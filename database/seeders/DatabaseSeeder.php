<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// use App\Models\User;

use App\Models\Criteria;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            //tidak perlu import karena satu namespace
            UserSeeder::class,
            TasksSeeder::class,
            PostSeeder::class,
            CriteriaSeeder::class,
            SubCriteriaSeeder::class,
            AlternatifAllSeeder::class,
        ]);


        // foreach($users as $user ){
        //     User::create($user);
        // }

        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
