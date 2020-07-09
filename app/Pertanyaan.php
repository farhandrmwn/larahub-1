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
        // return $this->hasMany('App\Jawaban', 'jawaban_id');
    }
}
