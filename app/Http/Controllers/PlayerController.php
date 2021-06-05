<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PlayerController extends BaseController
{
    /**
     * players table
     */
    public function index() {
        $players = $this->getProPlayerTableData();
        return view('player.index', [
            'players' => $players
        ]);
    }

    /**
     * team detail
     */
    public function team($teamId) {
        $team = $this->getTeamData($teamId);

        $matches = $this->getTeamMatchesData($teamId);
        foreach ($matches as $match) {
            if ($match['radiant_win'] == $match['radiant']) {
                $match['result'] = 'win';
            } else {
                $match['result'] = 'lose';
            }
            // $match['duration'] = 'lose';
        }

        return view('player.team', [
            'team' => $team,
            'matches' => $matches
        ]);
    }
}