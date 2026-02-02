<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    protected $table = 'siswa';


    protected $fillable = [
        'user_id',
        'nis',
        'kelas'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
