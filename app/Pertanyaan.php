<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    /*
    * menggunakan tabel pertanyaan
    */
    protected $table = "pertanyaan";

    public function Jawaban()
    {
        return $this->hasMany('App\Jawaban');
        // return $this->hasMany('App\Jawaban', 'id');
    }

    public function komentar()
    {
        return $this->hasMany("App\Komentar", "pertanyaan_id");
    }

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
