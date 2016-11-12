<?php

namespace App\Http\Controllers;

use Barryvanveen\Lastfm\Constants;
use Barryvanveen\Lastfm\Lastfm;

class LastfmController extends Controller
{
    public function index(Lastfm $lastfm)
    {
        /*$albums = $lastfm->userTopAlbums('barryvanveen')
            ->period(Constants::PERIOD_WEEK)
            ->limit(5)
            ->get();

        $artists = $lastfm->userTopArtists('barryvanveen')
            ->period(Constants::PERIOD_YEAR)
            ->get();

        $tracks = $lastfm->userRecentTracks('barryvanveen')
            ->period(Constants::PERIOD_MONTH)
            ->get();

        $user = $lastfm->userInfo('barryvanveen')
            ->get();


        dd(compact('albums', 'artists', 'tracks', 'user', 'nowListening'));*/

        $albums = $lastfm->userTopAlbums('barryvanveen')
            ->limit(5)
            ->get();


        $artists = $lastfm->reset('method')
            ->userTopArtists('barryvanveen')
            ->get();

        dd([$albums, $artists]);
    }
}
