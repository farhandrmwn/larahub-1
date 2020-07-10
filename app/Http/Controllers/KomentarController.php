<?php

namespace App\Http\Controllers;

use App\Komentar;
use App\Pertanyaan;
use App\Jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KomentarController extends Controller
{
    protected $table = "komentar";

    static function pertanyaan($pertanyaan_id)
    {
        $listKomentar = Pertanyaan::with(["komentar.user", "user"])
            ->where("pertanyaan.id", "=", $pertanyaan_id)
            ->get();
        return $listKomentar;
    }

    static function jawaban($pertanyaan_id)
    {
        $listKomentar = Jawaban::with(["user", "komentar", "komentar.user"])
            ->where("jawaban.pertanyaan_id", "=", $pertanyaan_id)
            ->get();

        return $listKomentar;
    }
}
