<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Mapel::all() as $key => $mapel) {
            DB::table('gurus')->insert([
                'nama_guru' => 'Agus Diana',
                'nip' => '196312241989032006',
                'mapel_id' => $mapel->id,
            ]);
        }
    }
}
