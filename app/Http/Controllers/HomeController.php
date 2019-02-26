<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;
use Goutte\Client;

class HomeController extends Controller
{
    function run(){
        return view('home');
    }
}
