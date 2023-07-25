<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCriteriaSeeder extends Seeder
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
            'kriteria_id'=>'1',
            'sub_kriteria'=>'Serabutan',
            'nilai_skala'=>'3',
            ],
            [
            'kriteria_id'=>'1',
            'sub_kriteria'=>'PHK',
            'nilai_skala'=>'2',
            ],
            [
            'kriteria_id'=>'1',
            'sub_kriteria'=>'Wirausaha',
            'nilai_skala'=>'1',
            ],
            [
                'kriteria_id'=>'2',
                'sub_kriteria'=>'< Rp .1.000.000 ',
                'nilai_skala'=>'4',
                ],
                [
                'kriteria_id'=>'2',
                'sub_kriteria'=>'Rp .1.000.000 - 2.000.000',
                'nilai_skala'=>'3',
                ],
                [
                'kriteria_id'=>'2',
                'sub_kriteria'=>'Rp .2.000.000 - 2.500.000',
                'nilai_skala'=>'2',
                ],
                [
                'kriteria_id'=>'2',
                'sub_kriteria'=>'> Rp. 2.500.000',
                'nilai_skala'=>'1',
                ],
                [
                    'kriteria_id'=>'3',
                    'sub_kriteria'=>'Milik sendiri ',
                    'nilai_skala'=>'1',
                    ],
                    [
                    'kriteria_id'=>'3',
                    'sub_kriteria'=>'Mengintrak',
                    'nilai_skala'=>'2',
                    ],
                    [
                    'kriteria_id'=>'3',
                    'sub_kriteria'=>'menumpang keluarga ( pisah kk )',
                    'nilai_skala'=>'3',
                    ],
                        [
                        'kriteria_id'=>'4',
                        'sub_kriteria'=>'1 Tangggungan',
                        'nilai_skala'=>'1',
                        ],
                        [
                        'kriteria_id'=>'4',
                        'sub_kriteria'=>'2 Tangggungan',
                        'nilai_skala'=>'2',
                        ],
                        [
                            'kriteria_id'=>'4',
                            'sub_kriteria'=>'3 Tangggungan ',
                            'nilai_skala'=>'3',
                            ],
                            [
                            'kriteria_id'=>'4',
                            'sub_kriteria'=>'4 Tangggungan',
                            'nilai_skala'=>'4',
                            ],
                            [
                            'kriteria_id'=>'5',
                            'sub_kriteria'=>'Kel.Kendal',
                            'nilai_skala'=>'1',
                            ],
                            [
                            'kriteria_id'=>'5',
                            'sub_kriteria'=>'Luar Kel.Kendal',
                            'nilai_skala'=>'2',
                            ],
            // [
            // 'user_id'=>'2',
            // 'kriteria'=>'Penghasilan',
            // 'bobot_kriteria'=>'5',
            // 'created_at'=>now(),
            // 'updated_at'=>now(),
            // ],
            // [
            // 'user_id'=>'3',
            // 'kriteria'=>'Kepemilikan Rumah',
            // 'bobot_kriteria'=>'5',
            // 'created_at'=>now(),
            // 'updated_at'=>now(),
            // ],
            // [
            // 'user_id'=>'4',
            // 'kriteria'=>'Tanggungan',
            // 'bobot_kriteria'=>'4',
            // 'created_at'=>now(),
            // 'updated_at'=>now(),
            // ],
            // [
            // 'user_id'=>'5',
            // 'kriteria'=>'Domisili',
            // 'bobot_kriteria'=>'3',
            // 'created_at'=>now(),
            // 'updated_at'=>now(),
            // ],
            
        ])->each(function ($user){
            DB::table('sub_criterias')->insert($user);
        });
    }
}
