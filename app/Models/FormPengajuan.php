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

    protected $table = 'form_pengajuan';

    protected $fillable = ['user_id', 'ditujukan', 'alamat', 'tugas_matkul','keperluan','status'];

    public function user()
{
    return $this->belongsTo(FormPengajuan::class, 'user_id');
    
}
}