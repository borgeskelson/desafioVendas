<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Produto;

class HomeController extends Controller
{
    public function index($id=1) {
        $usuario = Usuario::findOrFail($id);
        $produtos = Produto::all();
        
        return view('home', [
            'usuario' => $usuario,
            'produtos' => $produtos
        ]);
    }
}
