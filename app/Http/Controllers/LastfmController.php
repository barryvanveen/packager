<?php

namespace App\Http\Controllers;

use Barryvanveen\Lastfm\Constants;
use Barryvanveen\Lastfm\Lastfm;
use GuzzleHttp\Client;

class LastfmController extends Controller
{
    public function index(Lastfm $lastfm)
    {
        $lastfm_username = 'barryvanveen';

        $albums = $lastfm->userTopAlbums($lastfm_username)
            ->period(Constants::PERIOD_WEEK)
            ->limit(3)
            ->get();

        $artists = $lastfm->userTopArtists($lastfm_username)
            ->period(Constants::PERIOD_YEAR)
            ->limit(4)
            ->get();

        $tracks = $lastfm->userRecentTracks($lastfm_username)
            ->period(Constants::PERIOD_MONTH)
            ->limit(5)
            ->get();

        $user = $lastfm->userInfo($lastfm_username)
            ->get();

        $lastfm2 = new Lastfm(new Client(), config('lastfm.api_key'));
        $nowListening = $lastfm2->nowListening($lastfm_username);

        dd(compact('albums', 'artists', 'tracks', 'user', 'nowListening'));
    }
}
