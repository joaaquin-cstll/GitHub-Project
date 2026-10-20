<?php

namespace App\Http\Controllers; //esto es como los packages de java

// import request (Petición)
use Illuminate\Http\Request; // esto es como el import de java

class PrimerasRutasController extends Controller
{
    function index() {
        return view('freelance.index');
    }
    function primerMensaje() {
        echo '<h1>Yo soy el <a href="/"> primer método</h1>'; // nunca
    }
}
