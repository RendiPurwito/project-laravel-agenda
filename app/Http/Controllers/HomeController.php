<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Agenda;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function adminHome() {
        $jumlahguru = Guru::count();
        $jumlahkelas = Kelas::count();
        $jumlahagenda = Agenda::count();
        return view("adminhome", compact('jumlahguru', 'jumlahkelas', 'jumlahagenda'));
    }

    public function index(){
        $data = Agenda::select('agendas.*', 'gurus.*', 'kelas.*', 'mapels.*', 'agendas.id as id_agenda')
		->leftJoin('gurus', 'agendas.guru_id', 'gurus.id')
		->leftJoin('kelas', 'kelas.id', 'agendas.kelas_id')
		->leftJoin('mapels', 'mapels.id', 'gurus.mapel_id')
		->paginate(5);
        
        return view('home',['data' => $data]);
    }

    public function create(){
        $dataguru = Guru::all();
        $datamapel = Mapel::all();
        $datakelas = Kelas::all();
        return view('home', [
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
        return redirect()->route('home')->with('success', 'Data Berhasil Ditambahkan');
    }
}
