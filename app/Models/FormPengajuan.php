<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;


class FormPengajuan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'pengajuan_surat_survei';
    protected $primaryKey = 'id_surat_survei';

    protected $fillable = ['id_mahasiswa', 'ditujukan', 'alamat', 'tugas_matkul', 'keperluan', 'status'];

    public function user()
    {
        return $this->belongsTo(FormPengajuan::class, 'id_mahasiswa');
    }
}
