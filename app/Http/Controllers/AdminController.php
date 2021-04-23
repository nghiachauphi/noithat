<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function admin()
    {
        return view("admin.index");
    }

    public function tables()
    {
        return view("admin.tables");
    }

     

     
}