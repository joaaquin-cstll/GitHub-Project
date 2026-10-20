<?php

namespace App\Http\Controllers; //esto es como los packages de java

use Illuminate\Http\Request; // esto es como el import de java

class SegundasRutasController extends Controller
{
    function enlaces() {
        echo '
        <ul>
            <li><a href="../">Enlace 1</a></li>
            <li><a href="../mensaje">Enlace 2</a></li>
            <li><a href="">Enlace 3</a></li>
        </ul>
        ';
    }
}
