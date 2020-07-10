<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reputasi extends Model
{
    /*
    * menggunakan tabel reputasi
    */
    protected $table = "reputasi";
    protected $fillable = ["user_id", "poin"];
    public $timestamps = false;

    static function insertPoin($tipe_vote, $user_pembuat_pertanyaan_id, $user_id)
    {
        Reputasi::create([
            'user_id' => $tipe_vote === "up" ? $user_pembuat_pertanyaan_id : $user_id,
            'poin' => $tipe_vote === "up" ? 15 : -1
        ]);
    }
}
