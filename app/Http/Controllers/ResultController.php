<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCriteriaRequest;
use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function index(){
    
        $data = DB::table('criterias')->join('sub_criterias', 'sub_criterias.kriteria_id', '=', 'criterias.id')->get();
        return view('results.index', [
            'data'=>$data,
            'subcriterias' => DB::table('sub_criterias')->orderBy('id', 'asc')->get(),
            'criterias' => DB::table('criterias')->orderBy('id', 'asc')->get(),
        ]);

    }

    public function store(Request $request){

        // DB::table('criterias')->insert([
        //     'kriteria' => $request -> kriteria,
        //     'bobot_kriteria' => $request -> bobot_kriteria,
        // ]);
        
        // $jtbl = Criteria::join('criterias', 'subcriterias.id', '=', 'criterias.kriteria_id' )->get(['subcriterais.*', 'criterias.krterias']);

        Criteria::insert(['kriteria' =>$request->kriteria, 'bobot_kriteria' => $request -> bobot_kriteria,]);
           dd($request);

        SubCriteria::create([
                'kriteria_id' => $request -> kriteria_id,
                'sub_kriteria' => $request -> sub_kriteria,
                'nilai_skala' => $request -> nilai_skala,
        ]);

        // Criteria::create($request->all());
        return back();
    }

}
