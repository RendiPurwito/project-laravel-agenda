<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Mapel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        $data = Guru::select('gurus.*', 'users.*', 'mapels.*', 'gurus.id as id_guru')
		->leftJoin('users', 'users.id', 'gurus.user_id')
		->leftJoin('mapels', 'mapels.id', 'gurus.mapel_id')
        ->paginate(5);
        return view('Guru.table', ['data' => $data]);
    }

    public function create(){
        $datamapel = Mapel::all();
        $datauser = User::all();
        return view('Guru.add', [
            'datamapel' => $datamapel,
            'datauser' => $datauser
        ]);
    }

    public function store(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'nama_guru' => 'required',
            'nip' => 'required',
        ]);
        Guru::create($request->all());   
        return redirect()->route('guru')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){
        $data = Guru::find($id);
        $datamapel = Mapel::all();
        $datauser = User::all();
        return view('Guru.formedit', compact('data', 'datamapel', 'datauser'));
    }

    public function update(Request $request, $id){
        $data = Guru::find($id);
        $data->update($request->all());
        return redirect()->route('guru')->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id){
        $data = Guru::find($id);
        $data->delete();
        return redirect()->route('guru')->with('success', 'Data Berhasil Didelete');
    }
}
