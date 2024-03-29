<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class FormPerizinan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'pengajuan_surat_izin';
    protected $primaryKey = 'id_surat_izin';
    protected $fillable = [
        'id_mahasiswa',
        'nama_dosen',
        'tanggal_mulai',
        'tanggal_selesai',
        'jenis_izin',
        'nama_ortu',
        'nomor_hp_ortu',
        'bukti_waldos',
        'bukti_izin',
        'format_surat_izin',
        'status',
    ];
}
