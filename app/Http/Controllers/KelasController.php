<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(){
        $data = Kelas::select('kelas.*', 'gurus.*', 'kelas.id as id_kelas')
		->leftJoin('gurus', 'kelas.guru_id', 'gurus.id')
		->paginate(5);
        return view('Kelas.table', compact('data'));
    }

    public function create(){
        $dataguru = Guru::all();
        return view('Kelas.add', ['dataguru' => $dataguru]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'kelas' => 'required',
        ]);
        Kelas::create($request->all());   
        return redirect()->route('kelas')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){
        $data = Kelas::find($id);
        $dataguru = Guru::all();
        return view('Kelas.formedit', compact('data', 'dataguru'));
    }

    public function update(Request $request, $id){
        $data = Kelas::find($id);
        $data->update($request->all());
        return redirect()->route('kelas')->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id){
        $data = Kelas::find($id);
        $data->delete();
        return redirect()->route('kelas')->with('success', 'Data Berhasil Didelete');
    }
}
