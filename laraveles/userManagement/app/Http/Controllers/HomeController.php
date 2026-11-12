<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller {
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified', ['only' => ['edit']]); //Esto se aplica a un método en concreto
    }

    public function edit(): View {
        return view('home.edit');
    }

    public function home(): View {
        return view('home.home');
    }
}
