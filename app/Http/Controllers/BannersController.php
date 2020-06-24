<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;

class BannersController extends Controller
{
    public function index() {
        
        return view('addbanners');
    }
}