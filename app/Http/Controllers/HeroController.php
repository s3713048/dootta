<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

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
            $subs = $this->getSubscriptions($user['id']);
            foreach ($heros as &$hero) {
                $hero['subscribed'] = in_array($hero['id'], $subs);
            }
        }

        return view('hero.index', [
            'showSub' => $isLogin,
            'heros' => $heros
        ]);
    }

    /**
     * subscribe/unsubscribe to given hero
     */
    public function subscribe($heroId) {

        $user = $this->getUserInSession();
        if (empty($user)) {
            return redirect()->to('/user/login');
        }

        $userId = $user['id'];
        $this->subscribeToHero($userId, $heroId);
        return redirect()->to('/heros');
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