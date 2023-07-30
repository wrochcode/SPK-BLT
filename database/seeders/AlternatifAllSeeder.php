<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifAllSeeder extends Seeder
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
            'id_kriteria'=>'1',
            'id_subkriteria'=>'2',
            'name_warga'=>'erik',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'id_kriteria'=>'2',
            'id_subkriteria'=>'5',
            'name_warga'=>'erik',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'id_kriteria'=>'3',
            'id_subkriteria'=>'8',
            'name_warga'=>'erik',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'id_kriteria'=>'4',
            'id_subkriteria'=>'12',
            'name_warga'=>'erik',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'id_kriteria'=>'5',
            'id_subkriteria'=>'15',
            'name_warga'=>'erik',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],[
            'id_kriteria'=>'1',
            'id_subkriteria'=>'1',
            'name_warga'=>'nana',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'id_kriteria'=>'2',
            'id_subkriteria'=>'5',
            'name_warga'=>'nana',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'id_kriteria'=>'3',
            'id_subkriteria'=>'10',
            'name_warga'=>'nana',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'id_kriteria'=>'4',
            'id_subkriteria'=>'12',
            'name_warga'=>'nana',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'id_kriteria'=>'5',
            'id_subkriteria'=>'16',
            'name_warga'=>'nana',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],

            [
            'id_kriteria'=>'1',
            'id_subkriteria'=>'1',
            'name_warga'=>'Yola',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'id_kriteria'=>'2',
            'id_subkriteria'=>'5',
            'name_warga'=>'Yola',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'id_kriteria'=>'3',
            'id_subkriteria'=>'9',
            'name_warga'=>'Yola',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'id_kriteria'=>'4',
            'id_subkriteria'=>'13',
            'name_warga'=>'Yola',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'id_kriteria'=>'5',
            'id_subkriteria'=>'15',
            'name_warga'=>'Yola',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            
            
        ])->each(function ($user){
            DB::table('Alternatif_alls')->insert($user);
        });
    }
}
