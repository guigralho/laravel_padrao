<?php

namespace BeBack\Http\Controllers\Site;

use Illuminate\Http\Request;
use BeBack\Http\Controllers\Admin\Controller;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('Site.home.index');
    }
}
