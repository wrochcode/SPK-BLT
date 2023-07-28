<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlternatifAllRequest;
use App\Models\AlternatifAll;
use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternatifAllController extends Controller
{
    public function index()
    {
        $data = DB::table('criterias')->join('sub_criterias', 'sub_criterias.kriteria_id', '=', 'criterias.id')->get();


        $datakriterias = DB::table('criterias')->orderBy('id', 'asc')->get();
        $datasubkriterias = DB::table('sub_criterias')->orderBy('id', 'asc')->get();

        // ===========================================================================Input===========================================================================
        $datakriterias_input = $datakriterias;
        $datasubkriterias_input = $datasubkriterias;

        //cari kerja:
        $indexing = 1;
        $hitung = 0;
        $ceklist = 0;
        // dd($datakriterias_input);
        foreach ($datakriterias_input as $inputan_kriteria) {
            if ($ceklist == 0) {
                foreach ($datasubkriterias_input as $inputan_sub) {

                    if ($indexing == $inputan_sub->kriteria_id) {
                        $criterias_pekerjaan[$hitung]["id"] = $inputan_sub->id;
                        $criterias_pekerjaan[$hitung]["nama"] = $inputan_sub->sub_kriteria;
                    }
                    $ceklist = 1;
                    $hitung++;
                }
            }
        }

        //cari penghasilan:
        $indexing = 2;
        $hitung = 0;
        $ceklist = 0;
        // dd($datakriterias_input);
        foreach ($datakriterias_input as $inputan_kriteria) {
            if ($ceklist == 0) {
                foreach ($datasubkriterias_input as $inputan_sub) {

                    if ($indexing == $inputan_sub->kriteria_id) {
                        $criterias__penghasilan[$hitung]["id"] = $inputan_sub->id;
                        $criterias__penghasilan[$hitung]["nama"] = $inputan_sub->sub_kriteria;
                        $hitung++;
                    }
                    $ceklist = 1;
                }
            }
        }

        //cari Kepemilikan Rumah:
        $indexing = 3;
        $hitung = 0;
        $ceklist = 0;
        // dd($datakriterias_input);
        foreach ($datakriterias_input as $inputan_kriteria) {
            if ($ceklist == 0) {
                foreach ($datasubkriterias_input as $inputan_sub) {

                    if ($indexing == $inputan_sub->kriteria_id) {
                        $criterias_aset[$hitung]["id"] = $inputan_sub->id;
                        $criterias_aset[$hitung]["nama"] = $inputan_sub->sub_kriteria;
                        $hitung++;
                    }
                    $ceklist = 1;
                }
            }
        }

        //cari Kepemilikan Rumah:
        $indexing = 4;
        $hitung = 0;
        $ceklist = 0;
        // dd($datakriterias_input);
        foreach ($datakriterias_input as $inputan_kriteria) {
            if ($ceklist == 0) {
                foreach ($datasubkriterias_input as $inputan_sub) {

                    if ($indexing == $inputan_sub->kriteria_id) {
                        $criterias_beban[$hitung]["id"] = $inputan_sub->id;
                        $criterias_beban[$hitung]["nama"] = $inputan_sub->sub_kriteria;
                        $hitung++;
                    }
                    $ceklist = 1;
                }
            }
        }

        //cari Kepemilikan Rumah:
        $indexing = 5;
        $hitung = 0;
        $ceklist = 0;
        // dd($datakriterias_input);
        foreach ($datakriterias_input as $inputan_kriteria) {
            if ($ceklist == 0) {
                foreach ($datasubkriterias_input as $inputan_sub) {

                    if ($indexing == $inputan_sub->kriteria_id) {
                        $criterias_domisili[$hitung]["id"] = $inputan_sub->id;
                        $criterias_domisili[$hitung]["nama"] = $inputan_sub->sub_kriteria;
                        $hitung++;
                    }
                    $ceklist = 1;
                }
            }
        }
        // dd($criterias_domsili);

        // ===========================================================================Input===========================================================================



        // ===========================================================================Hasil Kasar===========================================================================
        $tw = $datakriterias; //data kriteria
        $sk = $datasubkriterias; //data kriteria
        $tb = 0; //total bobot
        $hitung = 0;
        // dd($tw);
        //cari total bobot
        foreach ($tw as $w) {
            $tb = $tb + $w->bobot_kriteria;
        }
        // dd($tb);
        //cari hasil bagi total bobot
        foreach ($tw as $t) {
            $bobot = $t->bobot_kriteria;
            // var_dump($bobot);
            $isi[$hitung] =  $bobot / $tb;
            $hitung++;
        }
        $hitung = 0;



        // ===========================================================================Hasil Kasar===========================================================================

        $count = 0;
        foreach ($datakriterias as $datakriteria) {
            foreach ($datasubkriterias as $datasubkriteria) {

                if ($datakriteria->id == $datasubkriteria->kriteria_id) {
                    $sub_id[$count] = $datasubkriteria->id;
                    $sub_nama[$count] = $datasubkriteria->sub_kriteria;
                    $count++;
                }
            }
        }
        $hitung = 0;
        $id = count($datakriterias);
        $tdata = 0;
        // ===========================================================================Hasil Kasar===========================================================================

        // kriteria:
        $jmlhdata = 0;
        $dataalternatif = DB::table('alternatif_alls')->orderBy('id', 'asc')->get();

        foreach ($datakriterias as $datakriteria) {
            $nama_kriteria[$hitung] = $datakriteria->kriteria;
            $hitung++;
        }
        // sub:
        $hitung = 0;
        foreach ($datasubkriterias as $datasubkriteria) {
            $nama_subkriteria[$hitung]["nama"] = $datasubkriteria->sub_kriteria;
            $nama_subkriteria[$hitung]["id"] = $datasubkriteria->id;
            $nama_subkriteria[$hitung]["bobot"] = $datasubkriteria->nilai_skala;
            $hitung++;
        }
        // dd($nama_subkriteria);

        // nama:
        $jmlhdata = 0;
        $hitung = 0;
        foreach ($dataalternatif as $alt) {
            if ($hitung == 0) {
                $wargaa[$jmlhdata] = $alt->name_warga;
            }
            $hitung++;
            // var_dump($hitung);
            if ($hitung == $id) {
                $jmlhdata++;
                $hitung = 0;
            }
        }


        $hitung = 0;
        $jmlhdata = 0;

        // final:
        // var_dump($nama_subkriteria[3]["id"]);
        foreach ($dataalternatif as $alt) {
            if ($hitung == 0) {
                $alter[$jmlhdata]['name_warga'] = $wargaa[$jmlhdata];
            }

            // var_dump($alt->id_subkriteria);
            foreach ($nama_subkriteria as $subs) {
                if ($alt->id_subkriteria == $subs["id"]) {
                    $varr1 = $subs["nama"];
                    // var_dump($varr2);

                }
            }
            $nama_kategori = $nama_kriteria[$hitung];
            $nama_subkategori = $varr1;
            // var_dump($nama_subkategori);
            $alter[$jmlhdata][$nama_kategori] = $nama_subkategori;
            $hitung++;
            if ($hitung == $id) {
                $jmlhdata++;
                $hitung = 0;
            }
        }
        // dd($alter);



        // ===========================================================================Lanjutan===========================================================================
        // sub kriteria:

        $hitung = 0;
        // $x=0;
        foreach ($alter as $alterr => $ass) {
            for ($x = 0; $x < count($nama_kriteria); $x++) {
                foreach ($sk as $subb__kriteria) {
                    $name_k = $nama_kriteria[$x];
                    if ($subb__kriteria->sub_kriteria == $ass[$name_k]) {
                        $vector_s[$hitung][$name_k] = $subb__kriteria->nilai_skala;
                    }
                }
            }
            $hitung += 1;
        }
        $hitung = 0;
        $isi2 = $isi;
        $y = count($isi);
        for ($ab = 0; $ab < $y; $ab++) {
            $hasil_float[$ab] = $isi[$ab];
        }

        $y = 0;
        // dd($hasil_float[4]);
        foreach ($vector_s as $vs) {
            $hasil_total = 0;
            for ($x = 0; $x < count($nama_kriteria); $x++) {
                $name_k = $nama_kriteria[$x];
                $var1 = $vs[$name_k];
                // $var1 = 0;
                $var2 = $hasil_float[$x];
                // var_dump($var2);
                // $var2 = $isi[$z];
                // dd($var2);
                // dd($vs[$name_k]);
                $hasil = $var1 * $var2;
                $hasil_total += $hasil;
            }
            $hitung += 1;
            $vector_skala[$y] = $hasil_total;
            $y++;
        }
        // dd($vector_skala);

        $total = 0;
        for ($x = 0; $x < count($vector_skala); $x++) {
            $total += $vector_skala[$x];
            $vectors_final[$x] = $vector_skala[$x] / $total;
        }
        $max = $vectors_final[0];
        $min = $vectors_final[0];
        for ($x = 0; $x < count($vector_skala) - 1; $x++) {
            if ($max < $vectors_final[$x + 1]) {
                $max = $vectors_final[$x];
            }
            if ($min > $vectors_final[$x + 1]) {
                $min = $vectors_final[$x];
            }
        }
        // dd($vectors_final);








        return view('alternatifalls.index', [
            'subcriteria' => new SubCriteria,
            'criteria' => new Criteria,
            'alternatifall' => new AlternatifAll,
            'alter' => $alter,
            'max' => number_format($max, 3),
            'min' => number_format($min, 3),
            'submit' => 'Create',
            'subcriterias_id' => $sub_id,
            'subcriterias_nama' => $sub_nama,
            'count' => $count,
            'criterias' => $datakriterias,
            'alternatifalls' => DB::table('alternatif_alls')->orderBy('id', 'asc')->get(),
            'data' => $data,
            'finalvektor' => $vectors_final,
            'criterias_pekerjaan' => $criterias_pekerjaan,
            'criterias_penghasilan' => $criterias__penghasilan,
            'criterias_aset' => $criterias_aset,
            'criterias_beban' => $criterias_beban,
            'criterias_domisili' => $criterias_domisili,

        ]);
    }

    public function store(AlternatifAllRequest $request)
    {
        $loop_kategori[0] = $request->criterias_pekerjaan;
        $loop_kategori[1] = $request->criterias_penghasilan;
        $loop_kategori[2] = $request->criterias_aset;
        $loop_kategori[3] = $request->criterias_beban;
        $loop_kategori[4] = $request->criterias_domisili;
        // dd($request);

        for ($x = 0; $x < 5; $x += 1) {
            $id_kriteria = $x + 1;
            AlternatifAll::create([
                'id_kriteria' => $id_kriteria,
                'id_subkriteria' => $loop_kategori[$x],
                'name_warga' => $request->name_warga,
            ]);
        }


        // AlternatifAll::create([
        //         'id_kriteria' => $request -> id_kriteria,
        //         'id_subkriteria' => $request -> id_subkriteria,
        //         'name_warga' => $request -> name_warga,
        // ]);

        // Criteria::create($request->all());
        return back();
    }

    public function edit($id)
    {
        $alternatifall = DB::table('alternatif_alls')->where('id', $id)->first();
        return view('alternatifalls.edit', [
            'submit' => 'Update',
            'alternatifall' => $alternatifall,

        ]);
    }

    // public function edit(AlternatifAll $alteratifall){
    //     return view('alternatifalls.edit', [
    //         'submit' => 'Update',
    //         'alternatifall'=> $alteratifall,

    //     ]);
    // }


    public function update(AlternatifAllRequest $request, $id)
    {
        AlternatifAll::find($id)->update([
            'id_kriteria' => $request->id_kriteria,
            'id_subkriteria' => $request->id_subkriteria,
            'name_warga' => $request->name_warga,
        ]);

        return redirect('alternatifalls');
    }

    public function destroy($id)
    {
        // dd($id);
        $alter = DB::table('alternatif_alls')->orderBy('id', 'asc')->get();
        // dd($alter);
        $hitung = 0;
        foreach ($alter as $alter) {
            if ($alter->name_warga == $id) {
                $delete[$hitung] = $alter->id;
                $hitung++;
            }
        }
        // dd($delete);

        for ($x = 0; $x < 5; $x += 1) {
            $id =
                AlternatifAll::find($delete[$x])->delete();
        }
        // // AlternatifAll::find($id)->delete();
        return back();
    }
}
