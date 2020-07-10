<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use App\Komentar;
use App\Pertanyaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pertanyaan = KomentarController::pertanyaan($id)->first();
        $jawaban = KomentarController::jawaban($id);

        return view('Jawaban.index', compact('pertanyaan', 'jawaban'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        return view('jawaban.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $qs = $request->fullUrl();
        // $qs = explode('/', $qs);
        // $leng = count($qs);
        // $qs = $qs[$leng];

        $date_created = date('Y-m-d H:i:s');
        $name = $request->input('pertanyaan_id');

        $new_jawab = Jawaban::create([
            "user_id" => Auth::user()->id,
            "pertanyaan_id" => $request["pertanyaan_id"],
            "isi" => $request["isi"],
            "created_at" => $date_created,

        ]);
        return redirect('/pertanyaan/' . $name);
    }

    public function insertKomentar(Request $request, $id_pertanyaan)
    {
        $komentar = new Komentar();
        $komentar->pertanyaan_id = $id_pertanyaan;
        $komentar->jawaban_id = $request->input("jawaban_id") !== NULL ? $request->input("jawaban_id") : NULL;
        $komentar->user_id = auth()->id();
        $komentar->isi = $request->input("isi");
        $komentar->created_at = now();

        $komentar->save();

        return redirect("/pertanyaan/" . $id_pertanyaan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
