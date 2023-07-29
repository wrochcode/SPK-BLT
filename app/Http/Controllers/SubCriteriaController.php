<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCriteriaRequest;
use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCriteriaController extends Controller
{
    public function index(){

        // $data = DB::table('criterias')->join('detail_barang', 'detail_barang.id_barang', '=', 'barang.id_barang')->get();
        $data = DB::table('criterias')->join('sub_criterias', 'sub_criterias.kriteria_id', '=', 'criterias.id')->get();

        return view('subcriterias.index', [
            'subcriteria' => new Subcriteria,
            'criteria' => new Criteria,
            'submit' => 'Create',
            'subcriterias' => DB::table('sub_criterias')->orderBy('id', 'asc')->get(),
            'criterias' => DB::table('criterias')->orderBy('id', 'asc')->get(),
            'data'=>$data,
            

        ]);
    }

    public function store(SubCriteriaRequest $request){

        Subcriteria::create([
                'kriteria_id' => $request -> kriteria_id,
                'sub_kriteria' => $request -> sub_kriteria,
                'nilai_skala' => $request -> nilai_skala,
        ]);

        // Criteria::create($request->all());
        return back();
    }
    public function edit($id){
        $subcriteria = DB::table('sub_criterias')->where('id', $id)->first();
        return view('subcriterias.edit', [
            'submit' => 'Update',
            'subcriteria'=> $subcriteria,
            
        ]);
    }


    public function update(SubCriteriaRequest $request, $id){
        SubCriteria::find($id)->update([
            'kriteria_id' => $request -> kriteria_id,
            'sub_kriteria' => $request -> sub_kriteria,
            'nilai_skala' => $request -> nilai_skala,
        ]);

        return redirect('subcriterias');
    }

    public function destroy($id){
        SubCriteria::find($id)->delete();
        return back();
    }
}
