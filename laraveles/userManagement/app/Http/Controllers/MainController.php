<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller {

    public function about(): View {
        return view('main.about');
    }

    public function index(): View {
        return view('layouts.app');
    }
}
