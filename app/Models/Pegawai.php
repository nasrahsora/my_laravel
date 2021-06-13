<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $fillable =[ 'id',
    'nama','alamat','jabatan_id','tgllhr'];

    public function jabatan()
    {
    	return $this->belongsTo(Jabatan::class);//untuk merelasikan dengan tabel jabatan
    }
}
