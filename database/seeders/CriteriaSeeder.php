<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [

            'kriteria'=>'Pekerjaan',
            'bobot_kriteria'=>'4',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
           
            'kriteria'=>'Penghasilan',
            'bobot_kriteria'=>'5',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
           
            'kriteria'=>'Kepemilikan Rumah',
            'bobot_kriteria'=>'5',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            
            'kriteria'=>'Tanggungan',
            'bobot_kriteria'=>'4',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
           
            'kriteria'=>'Domisili',
            'bobot_kriteria'=>'3',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            
        ])->each(function ($user){
            DB::table('criterias')->insert($user);
        });
    }
}
