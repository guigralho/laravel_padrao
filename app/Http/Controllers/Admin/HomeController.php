<?php

namespace BeBack\Http\Controllers\Admin;

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
        return view('Admin.home.index');
    }

    public function setPin(Request $request){
        $request->session()->forget('pinned');
        $request->session()->put('pinned', $request->get('pinned'));

        return ['success' => $request->session()->get('pinned')];
    }
}
