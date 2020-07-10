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

    public function komentar()
    {
        return $this->hasMany('App\Komentar', 'jawaban_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
