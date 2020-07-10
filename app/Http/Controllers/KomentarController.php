<?php

namespace App\Http\Controllers;

use App\Komentar;
use App\Pertanyaan;
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

    static function getPertanyaan($pertanyaan_id)
    {
        $listKomentar = Komentar::with(['user'])
            ->where("komentar.pertanyaan_id", "=", $pertanyaan_id)
            ->where("komentar.jawaban_id", "=", NULL)
            ->get();
        return $listKomentar;
    }

    static function getJawaban($pertanyaan_id)
    {
        $listKomentar = DB::select(
            "SELECT
                komentar.isi AS komentar_isi,
                komentar.user_id AS user_id,
                komentar.jawaban_id AS jawaban_id,
                users.name AS user_name,
                jawaban.pertanyaan_id AS pertanyaan_id
            FROM komentar
            INNER JOIN jawaban
                ON komentar.jawaban_id = jawaban.id
            INNER JOIN pertanyaan
                ON komentar.jawaban_id = pertanyaan.id
            INNER JOIN users
                ON komentar.user_id = users.id
            WHERE jawaban.pertanyaan_id = $pertanyaan_id"
        );

        return $listKomentar;
    }
}
