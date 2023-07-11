<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Student extends Authenticatable
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'user_id';

    protected $fillable = array(
        'nim', 'name', 'prodi', 'kelas', 'nama_dosen', 'nomor_hp', 'alamat', 'email', 'password'
    );
}
