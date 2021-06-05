<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class BaseController extends Controller
{
    private $BASE_URL_OPEN_DOTA = 'https://api.opendota.com';
    private $HERO_STATS = '/api/heroStats';
    private $HERO_RANKINGS = '/api/rankings?hero_id=';
    private $PRO_PLAYERS = '/api/proPlayers';
    private $TEAM = '/api/teams/';

    /**
     * pull heros data from open dota api and save to database
     */
    protected function tryInitHerosTable() {

    }

    /**
     * utility function to make a request to open dota api
     */
    private function request($method, $requestUrl) {

        $httpClient = new Client([
            'base_uri' => $this->BASE_URL_OPEN_DOTA,
            'timeout'  => 20.0,
        ]);

        $response = $httpClient->request($method, $requestUrl);

        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else {
            return [];
        }
    }

    /**
     * get heros data including name, image, and others
     */
    protected function getHerosTableData() {
        $result = $this->request('GET', $this->HERO_STATS);
        return json_decode($result, true);
    }

    /**
     * get pro player ranked data including game id, avatar, and others
     */
    protected function getProPlayerTableData() {
        $result = $this->request('GET', $this->PRO_PLAYERS);
        return json_decode($result, true);
    }

    /**
     * get hero's ranking data from open dota api
     */
    protected function getHeroRankingsById($heroId) {
        $result = $this->request('GET', $this->HERO_RANKINGS . $heroId);
        return json_decode($result, true);
    }

    /**
     * get team data from open dota api
     */
    protected function getTeamData($teamId) {
        $result = $this->request('GET', $this->TEAM . $teamId);
        return json_decode($result, true);
    }

    /**
     * get subscription with given user id
     */
    protected function getSubscriptions($userId) {
        return [];
    }

    /**
     * subscribe/unsubscribe to hero
     */
    protected function subscribeToHero($userId, $heroId, $shouldSubscribe) {

    }

    /**
     * store user data in session
     */
    protected function createUserSession($user)
    {
        session([
            'current_user' =>
            [
                'id' => $user->id,
                'email' => $user->email,
                'user_name' => $user->user_name
            ]
        ]);
    }

    /**
     * clear user data in session
     */
    protected function clearUserSession()
    {
        session()->forget('current_user');
    }

    /**
     * get user data in session
     */
    protected function getUserInSession()
    {
        return session('current_user');
    }
}