<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use App\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function pertanyaan($id, $tipe_vote)
    {
        $voteResult = $this->hasVotePertanyaan($id, $tipe_vote);
        if (isset($voteResult[0]->user_id)) {
            return redirect("/");
        }

        $vote = new Vote();
        $vote->pertanyaan_id = $id;
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
}
