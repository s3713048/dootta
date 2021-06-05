<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HeroController extends BaseController
{

    /**
     * heros table
     */
    public function index() {

        $heros = $this->getHerosTableData();
        
        $user = $this->getUserInSession();
        $isLogin = !empty($user);
        if ($isLogin) {
            $subs = $this->getSubscriptions($user->id);
            foreach ($heros as $hero) {
                $hero['subscribed'] = Arr::has($subs, $hero['id']);
            }
        }

        return view('hero.index', [
            'showSub' => $isLogin,
            'heros' => $heros
        ]);
    }

    /**
     * hero's details
     */
    public function detail($heroId) {

        return view('heor.detail', []);
    }
}