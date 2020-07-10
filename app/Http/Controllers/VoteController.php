<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use App\Reputasi;
use App\Vote;
use App\Jawaban;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function pertanyaan($id, $tipe_vote)
    {
        $voteResult = $this->hasVotePertanyaan($id, $tipe_vote);
        if (isset($voteResult[0]->user_id)) {
            return redirect("/");
        }

        $userPembuatPertanyaan = Pertanyaan::where("id", $id)->get();

        Reputasi::insertPoin($tipe_vote, $userPembuatPertanyaan[0]->user_id, auth()->id());

        $vote = new Vote();
        $vote->pertanyaan_id = $id;
        $vote->user_id = auth()->id();
        $vote->tipe = $tipe_vote;
        $vote->created_at = now();

        $vote->save();
        return redirect("/");
    }

    public function jawaban($id, $tipe_vote)
    {
        $voteResult = $this->hasVoteJawaban($id, $tipe_vote);
        if (isset($voteResult[0]->user_id)) {
            return redirect("/");
        }
        $userPembuatJawaban = Jawaban::where("id", $id)->get();
        Reputasi::insertPoin($tipe_vote, $userPembuatJawaban[0]->user_id, auth()->id());

        $vote = new Vote();
        $vote->jawaban_id = $id;
        $vote->user_id = auth()->id();
        $vote->tipe = $tipe_vote;
        $vote->created_at = now();

        $vote->save();
        return redirect("/");
    }

    public function hasVotePertanyaan($pertanyaan_id, $tipe)
    {
        $result = Vote::where('pertanyaan_id', '=', $pertanyaan_id)
            ->where('user_id', '=', auth()->id())
            ->where('tipe', '=', $tipe)
            ->get();
        return $result;
    }

    public function hasVoteJawaban($jawaban_id, $tipe)
    {
        $result = Vote::where('jawaban_id', '=', $jawaban_id)
            ->where('user_id', '=', auth()->id())
            ->where('tipe', '=', $tipe)
            ->get();
        return $result;
    }
}
