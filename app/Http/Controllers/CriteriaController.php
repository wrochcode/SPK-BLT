<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriteriaRequest;
use App\Models\AlternatifAll;
use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CriteriaController extends Controller
{
    public function index()
    {


        return view('criterias.index', [
            'criteria' => new Criteria,
            'submit' => 'Create',
            'criterias' => DB::table('criterias')->orderBy('id', 'asc')->get(),
        ]);
    }

    public function store(CriteriaRequest $request)
    {
        // === Create Criteria ===
        Criteria::create([
            'kriteria' => $request->kriteria,
            'bobot_kriteria' => $request->bobot_kriteria,
        ]);

        // === Buat Array Nama ===
        $jmlhdata = 0;
        $hitung = 0;
        $datakriterias = DB::table('criterias')->orderBy('id', 'asc')->get();
        $dataalternatif = DB::table('alternatif_alls')->orderBy('id', 'asc')->get();
        $jumlah_criteria = count($datakriterias);
        $jumlah_criteria = $jumlah_criteria - 1; //di minus satu karena total kriteria sudah beda dari yang sebelumnya
        foreach ($dataalternatif as $alt) {
            if ($hitung == 0) {
                $wargaa[$jmlhdata] = $alt->name_warga;
                $nama_temp = $alt->name_warga;
            }
            if($alt->name_warga == $nama_temp){
                
                $hitung++;
            }
            // var_dump("Hitung: ".$hitung);
            if ($hitung == $jumlah_criteria) {
                $jmlhdata++;
                $hitung = 0;
            }
            // var_dump($jumlah_criteria);
        }
        // dd($wargaa);
        $last_data = Criteria::orderByDesc('created_at')->first();
        // dd($last_data->id);
        for ($x = 0 ; $x <count($wargaa);$x++) {
            AlternatifAll::create([
                'id_kriteria' => $last_data->id,
                'id_subkriteria' => null,
                'name_warga' => $wargaa[$x],
            ]);
        }
        return back();
    }

    public function edit($id)
    {
        $criteria = DB::table('criterias')->where('id', $id)->first();
        return view('criterias.edit', [
            'submit' => 'Update',
            'criteria' => $criteria,
        ]);
    }

    public function update(CriteriaRequest $request, $id)
    {

        DB::table('criterias')->where('id', $id)->update(['kriteria' => $request->kriteria]);

        return redirect('criterias');
    }

    public function destroy($id)
    {
        $datasubkriterias = DB::table('sub_criterias')->orderBy('id', 'asc')->get();

        Criteria::find($id)->delete();
        foreach ($datasubkriterias as $datasubkriteria) {
            if($id == $datasubkriteria->kriteria_id ){
                // var_dump($datasubkriteria->id);
                // Criteria::find($id)->delete();
                SubCriteria::find($datasubkriteria->id)->delete();
                
            }
        }
        return back();
    }
}
