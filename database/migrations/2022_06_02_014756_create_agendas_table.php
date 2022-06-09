<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id'); 
            $table->string('materi');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->string('absensi');
            $table->foreignId('kelas_id'); 
            $table->enum('jenis', ['ptm', 'pjj']);
            $table->string('link')->nullable();
            $table->string('dokumentasi');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
};
