<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AgendaController extends Controller
{
    public function index(){
        $datas = Agenda::select('agendas.*', 'gurus.*', 'kelas.*', 'mapels.*', 'agendas.id as id_agenda')
		->leftJoin('gurus', 'agendas.guru_id', 'gurus.id')
		->leftJoin('kelas', 'kelas.id', 'agendas.kelas_id')
		->leftJoin('mapels', 'mapels.id', 'gurus.mapel_id')
		->paginate(5);
        
        return view('Agenda.table',['datas' => $datas]);
    }

    public function create(){
        $dataguru = Guru::all();
        $datamapel = Mapel::all();
        $datakelas = Kelas::all();
        return view('Agenda.add', [
            'dataguru' => $dataguru,
            'datamapel' => $datamapel,
            'datakelas' => $datakelas
        ]);
    }

    public function store(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'materi' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'absensi' => 'required',
            'jenis' => 'required',
            'dokumentasi' => 'required',
        ]);

        $data = Agenda::create($request->all());
        if($request->hasFile('dokumentasi')){
            $request->file('dokumentasi')->move('images/', $request->file('dokumentasi')->getClientOriginalName());
            $data->dokumentasi = $request->file('dokumentasi')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('agenda')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){
        $data = Agenda::find($id);
        $dataguru = Guru::all();
        $datamapel = Mapel::all();
        $datakelas = Kelas::all();
        return view('Agenda.formedit', compact('data', 'dataguru', 'datamapel', 'datakelas'));
    }

    public function update(Request $request, $id){
        $data = Agenda::find($id);
        $data->update($request->all());
        if ($request->hasFile('dokumentasi')) {
            $destination = 'images/'.$data->dokumentasi;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('dokumentasi');
            $extension = $file->getClientOriginalName();
            $filename = time().'.'.$extension;
            $file->move('images/', $filename);
            $data->dokumentasi = $filename;
        }
        $data->update();
        return redirect()->route('agenda')->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id){
        $data = Agenda::find($id);
        $data->delete();
        return redirect()->route('agenda')->with('success', 'Data Berhasil Didelete');
    }

}
