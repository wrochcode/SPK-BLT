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

        // $data = DB::table('criterias')->join('detail_barang', 'detail_barang.id_barang', '=', 'barang.id_barang')->get();
        $data = DB::table('criterias')->join('sub_criterias', 'sub_criterias.kriteria_id', '=', 'criterias.id')->get();

        $datakriterias = DB::table('criterias')->orderBy('id', 'asc')->get();
        $datasubkriterias = DB::table('sub_criterias')->orderBy('id', 'asc')->get();

        // ===========================================================================Input===========================================================================
        $datakriterias_input = $datakriterias;
        $datasubkriterias_input = $datasubkriterias;

        // Final:
        $hitung_main = 0;
        $hitung_sub = 0;
        $ceklist = 0;
        $hitung = 0;
        // dd($datakriterias_input);
        foreach ($datakriterias_input as $inputan_kriteria) {
            $title[$hitung] = $inputan_kriteria->kriteria;
            foreach ($datasubkriterias_input as $inputan_sub) {
                if ($inputan_kriteria->id == $inputan_sub->kriteria_id) {
                    $data_all[$hitung_main][$hitung_sub]["id"] = $inputan_sub->id;
                    $data_all[$hitung_main][$hitung_sub]["nama"] = $inputan_sub->sub_kriteria;
                    $hitung_sub++;
                }
                $ceklist = 1;
            }
            $total_sub[$hitung] = $hitung_sub++;
            $hitung_sub = 0;
            $hitung_main++;
            $hitung++;
        }
        // dd($total_sub[0]);
        // dd($data_all);
        // dd($title);

        // ===========================================================================Input===========================================================================



        // ===========================================================================Hasil Kasar===========================================================================
        // Hitung Bobot:
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

        // Buat Array Nama:
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
        // dd($wargaa);
        // dd($jmlhdata);

        
        // final:
        $hitung = 0;
        $jmlhdata = 0;
        foreach ($dataalternatif as $alt) {
            if ($hitung == 0) {
                $alter[$jmlhdata]['name_warga'] = $wargaa[$jmlhdata];
            }

            // var_dump($alt->id_subkriteria);
            foreach ($nama_subkriteria as $subs) {
                if ($alt->id_subkriteria == $subs["id"]) {
                    $varr1 = $subs["nama"];
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
        $x = 0;
        // dd($nama_kriteria);
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
        // dd($vector_s);

        $hitung = 0;
        $y = count($isi);
        for ($ab = 0; $ab < $y; $ab++) {
            $hasil_float[$ab] = $isi[$ab];
        }

        $y = 0;
        $totalskala = 0;
        // dd($hasil_float[4]);
        foreach ($vector_s as $vs) {
            $hasil_total = 0;
            for ($x = 0; $x < count($nama_kriteria); $x++) {
                $name_k = $nama_kriteria[$x];
                $var1 = $vs[$name_k];
                // $var1 = 0;
                $var2 = $hasil_float[$x];

                $hasil = $var1 * $var2;
                $hasil_total += $hasil;
            }
            $hitung += 1;
            $vector_skala[$y] = $hasil_total;
            $totalskala += $hasil_total; // tambahan
            $y++;
        }
        // dd($totalskala);

        //    hitung vektor total:
        for ($x = 0; $x < count($vector_skala); $x++) {
            $vectors_final[$x] = $vector_skala[$x] / $totalskala;
            $alter[$x]["bobot"] = $vectors_final[$x];
        }
        // dd($alter);

        //hitung nilai maksimal minimal dari vektor total
        $max = $vectors_final[0];
        $min = $vectors_final[0];
        for ($x = 0; $x < count($vector_skala) - 1; $x++) {
            if ($max < $vectors_final[$x + 1]) {
                $max = $vectors_final[$x + 1];
            }
            if ($min > $vectors_final[$x + 1]) {
                $min = $vectors_final[$x + 1];
            }
        }

        // var_dump($max);
        $max_name = $alter[0]["name_warga"];
        $min_name = $alter[0]["name_warga"];
        $ma = 0;
        $mi = 0;
        $hitung = 0;
        // var_dump($max);
        for ($x = 0; $x < count($vector_skala); $x++) {
            $nilai = $alter[$x]["bobot"];
            $name = $alter[$x]["name_warga"];
            // var_dump($min);

            if ($nilai == $max) {
                $max_name =  $name;
            }
            if ($nilai == $min) {
                $min_name =  $name;
            }
        }

        // versi nama:
        $max = $max_name;
        $min = $min_name;


        // dd($data_all);
        $all_all_all = DB::table('alternatif_alls')->orderBy('id', 'asc')->get();
        // dd($all_all_all);
        return view('alternatifalls.index', [
            'subcriteria' => new SubCriteria,
            'criteria' => new Criteria,
            'alternatifall' => new AlternatifAll,
            'alter' => $alter,
            // 'max' => number_format($max, 3),
            // 'min' => number_format($min, 3),
            'max' => $max,
            'min' => $min,
            'submit' => 'Create',
            'subcriterias_id' => $sub_id,
            'subcriterias_nama' => $sub_nama,
            'count' => $count,
            'criterias' => $datakriterias,
            'alternatifalls' => $all_all_all,
            'data' => $data,
            'finalvektor' => $vectors_final,
            //for form
            'title' => $title,
            'total_sub' => $total_sub,
            'final_alternatif' => $data_all, //semua data untuk form
            // =============================================================

        ]);
    }

    public function store(AlternatifAllRequest $request)
    {
        $datakriterias = DB::table('criterias')->orderBy('id', 'asc')->get();

        // Converter spasi:
        foreach ($datakriterias as $datakriteria) {

            $huruf = $datakriteria->kriteria[0];

            for ($x = 1; $x < strlen($datakriteria->kriteria); $x++) {
                if ($datakriteria->kriteria[$x] == " ") {
                    $datakriteria->kriteria[$x] = "_";
                }
                $huruf = $huruf . $datakriteria->kriteria[$x];
            }

            $datakriteria->kriteria = $huruf;
        }

        //Input data:
        foreach ($datakriterias as $datakriteria) {
            $name_kriteria = $datakriteria->kriteria;
            AlternatifAll::create([
                'id_kriteria' => $datakriteria->id,
                'id_subkriteria' => $request->$name_kriteria,
                'name_warga' => $request->name_warga,
            ]);
        }
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
