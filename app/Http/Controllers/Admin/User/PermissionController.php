<?php

namespace BeBack\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use BeBack\Http\Controllers\Admin\Controller;

class PermissionController extends Controller
{

    public function index(Request $request)
    {
        return view('Admin.permission.index');
    }

}
