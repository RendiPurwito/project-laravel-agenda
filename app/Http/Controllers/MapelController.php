<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(){
        $data = Mapel::paginate(10) ;
        return view('Mapel.table', compact('data'));
    }

    public function create(){
        return view('Mapel.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'mapel' => 'required',
        ]);
    
        Mapel::create($request->all());
        return redirect()->route('mapel');
    }

    public function edit($id){
        $data = Mapel::find($id);
        return view('Mapel.formedit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Mapel::find($id);
        $data->update($request->all());
        return redirect()->route('mapel');
    }

    public function destroy($id){
        $data = Mapel::find($id);
        $data->delete();
        return redirect()->route('mapel');
    }
}
