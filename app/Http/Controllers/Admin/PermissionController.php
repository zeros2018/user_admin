<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.roles.index')->only('index');
    }

    public function index(){
        return view('admin.permission.index');
    }
}
