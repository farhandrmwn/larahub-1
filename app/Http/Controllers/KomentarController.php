<?php

namespace App\Http\Controllers;

use App\Komentar;
use App\Pertanyaan;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    protected $table = "komentar";

    static function getPertanyaan($pertanyaan_id)
    {
        // $listKomentar = Komentar::all()
        //     ->where("jawaban_id", "=", NULL)
        //     ->where("pertanyaan_id", "=", $pertanyaan_id);
        $listKomentar = Komentar::with(['user'])
            ->where("komentar.pertanyaan_id", "=", $pertanyaan_id)
            ->where("komentar.jawaban_id", "=", NULL)
            ->get();
        return $listKomentar;
    }

    static function getJawaban($jawaban_id)
    {
        $listKomentar = Komentar::all()
            ->where("pertanyaan_id", "=", NULL)
            ->where("jawaban_id", "=", $jawaban_id);
        return $listKomentar;
    }
}
