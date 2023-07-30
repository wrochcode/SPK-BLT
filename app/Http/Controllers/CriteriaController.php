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

        // === Buat Array Nama ===
        $jmlhdata = 0;
        $hitung = 0;
        $datakriterias = DB::table('criterias')->orderBy('id', 'asc')->get();
        $dataalternatif = DB::table('alternatif_alls')->orderBy('id', 'asc')->get();

        // New step :
        foreach ($dataalternatif as $alt) {
            foreach ($datakriterias as $datakriteria) {
                if ($hitung == 0) {
                    $nama_temp = $alt->name_warga;
                }
            }
            if (isset($wargaa)) {
                $sama = 0;
                for ($x = 0; $x < $jmlhdata; $x++) {
                    if ($nama_temp == $wargaa[$x]) {
                        $sama++;
                    }
                }
                if ($sama == 0) { // cek ada kesamaan data atau engga
                    $wargaa[$jmlhdata] = $nama_temp;
                    $jmlhdata++;
                }
            } else {
                $wargaa[$jmlhdata] = $nama_temp;
                $jmlhdata++;
            }
        }

        // === Create Criteria ===
        Criteria::create([
            'kriteria' => ucwords($request->kriteria),
            'bobot_kriteria' => $request->bobot_kriteria,
        ]);
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
        $dataalternatif = DB::table('alternatif_alls')->orderBy('id', 'asc')->get();

        foreach ($datasubkriterias as $datasubkriteria) {
            if($id == $datasubkriteria->kriteria_id ){
                // var_dump($datasubkriteria->id);
                // Criteria::find($id)->delete();
                SubCriteria::find($datasubkriteria->id)->delete();
                
            }
        }
        
        // dd($dataalternatif);
        foreach ($dataalternatif as $alt) {
            if($id == $alt->id_kriteria ){
                // var_dump($datasubkriteria->id);
                // Criteria::find($id)->delete();
                AlternatifAll::find($alt->id)->delete();
                
            }
        }
        Criteria::find($id)->delete();
        return back();
    }
}
