<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * [index of app frontend]
     * @return [view] [app frontend]
     */
    public function index() {
        return view('welcome');
    }
}
