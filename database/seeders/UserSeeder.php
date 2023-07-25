<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::factory()->count(5)->create();

        // collect([
        //     [
        //     'name'=>'Nasuka G Fauzi',
        //     'email'=>'Gozi@gmail.com',
        //     'password'=>bcrypt('password'),
        //     'email_verified_at'=>now(),
        //     'created_at'=>now(),
        //     'updated_at'=>now(),
        //     ],
        //     [
        //         'name'=>'Dior',
        //         'email'=>'Dior@gmail.com',
        //         'password'=>bcrypt('password'),
        //         'email_verified_at'=>now(),
        //         'created_at'=>now(),
        //         'updated_at'=>now(),
        //     ],
        // ])->each(function ($user){
        //     DB::table('users')->insert($user);
        // });
    }
}
