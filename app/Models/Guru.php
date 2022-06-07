<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function agendaguru(){
        return $this->hasMany(Agenda::class);
    }

    public function kelasguru(){
        return $this->hasOne(Kelas::class);
    }

    public function userguru(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function mapelguru(){
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }
}
