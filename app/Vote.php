<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /*
    * menggunakan tabel vote
    */
    protected $table = "vote";
    public $timestamps = false;
}
