<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    /*
    * menggunakan tabel jawaban
    */
    protected $table = "jawaban";
    public $timestamps = false;
    protected $guarded = [];

    public function Jawaban()
    {
        // return $this->belongsTo('App\Pertanyaan');
        return $this->belongsTo('App\Pertanyaan', 'jawaban_id');
    }
}
