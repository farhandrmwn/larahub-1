<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    /*
    * menggunakan tabel komentar
    */
    protected $table = "komentar";
    protected $fillable = ["pertanyaan_id"];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo("App\User", "user_id");
    }

    public function pertanyaan()
    {
        return $this->hasOne("App\Pertanyaan", "id");
    }
}
