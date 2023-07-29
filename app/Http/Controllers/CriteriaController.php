<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriteriaRequest;
use App\Models\Criteria;
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

        Criteria::create([
            'kriteria' => $request->kriteria,
            'bobot_kriteria' => $request->bobot_kriteria,
        ]);

        // Criteria::create($request->all());
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
        // Criteria::find($id)->delete();
        return back();
    }
}
