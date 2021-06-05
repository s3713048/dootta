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

        // get heros data
        $heros = $this->getHerosTableData();
        
        // get user's subscription data
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
    public function detail(Request $request) {

        $hero = json_decode($request->hero_data, true);
        $hero['roles'] = implode(", ", $hero['roles']);

        $rankings = $this->getHeroRankingsById($hero['id']);

        return view('hero.detail', [
            'hero' => $hero,
            'rankings' => $rankings['rankings']
        ]);
    }
}