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
        $featuredFeeds = $feed->orderBy('created_at', 'desc')->get();

        // TODO: Not implemented yet
        $feeds = [];

        return view('home', ['featuredFeeds' => $featuredFeeds,'feeds' => $feeds]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $title)
    {
        $feed = Feed::find($id);
        if (!$feed) return redirect('/ ', 301); 
        return view('detailFeed', ['feed' => $feed]);
    }
}
