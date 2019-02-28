<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FeedService;
use App\Feed;

class HomeController extends Controller
{
    function index  (FeedService $feedInstance){

        // TODO: add waiting time
        $feedInstance->loadDefaultSourceFeeds();                    


        // GET  the last five news from the newspapers "El País" and "El mundo"
        $feed = new Feed();
        $featuredFeeds = $feed
                            ->where('source', 'ILIKE', '%elmundo%')
                            ->orWhere('source', 'ILIKE', '%elpais%')
                            ->orderBy('created_at', 'desc')->get()
                            ->take(10);

        // TODO: Not implemented yet
        $feeds = [];

        return view('home', ['featuredFeeds' => $featuredFeeds,'feeds' => $feeds]);
    }
}
