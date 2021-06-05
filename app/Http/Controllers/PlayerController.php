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
        return view('player.team', [
            'team' => $team
        ]);
    }
}