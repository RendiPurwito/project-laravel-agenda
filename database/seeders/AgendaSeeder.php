<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Guru::all() as $key => $guru) {
            DB::table('agendas')->insert([
                'guru_id' => $guru->id,
                'mapel_id' => $guru->id,
                'materi' => 'Laravel',
                'jam_mulai' => 'jam 1',
                'jam_selesai' => 'jam 3',
                'absensi' => 'Wisnu Eka(sakit)',
                'jenis' => 'ptm',
                'link' => 'https://meet.google.com/tui-mqzw-vev',
                'dokumentasi' => 'Absen 1.jpg',
                'keterangan' => 'tidak masuk : Fattan, Dina',
            ]);
        }

        foreach (Kelas::all() as $key => $kelas) {
            DB::table('agendas')->insert([
                'kelas_id' => $kelas->id,
            ]);
        }
    }
}
