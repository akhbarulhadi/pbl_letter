<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'user_id';

    protected $fillable = array(
        'nim','name','prodi','kelas','nama_dosen','nomor_hp','email','password'
    );
}