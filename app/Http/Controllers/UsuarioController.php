<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function create() {
        return view('usuarios.create');
    }

    public function store(Request $request) {
        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email
        ]);

        return "Usuário cadastrado com sucesso!";
    }

    public function show($id) {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', ['usuario' => $usuario]);
    }

    public function edit($id) {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id) {
        $usuario = Usuario::findOrFail($id);

        $usuario->update([
            'nome' => $request->nome,
            'email' => $request->email
        ]);

        return "Usuário atualizado com sucesso!";
    }

    public function delete($id) {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.delete', ['usuario' => $usuario]);
    }

    public function destroy($id) {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return "Usuário excluído com sucesso!";
    }

    public function indexPedidos($id)
    {
        //Lista todos os pedidos do usuário (abertos e finalizados)
        $usuario = Usuario::with('pedidos', 'pedidos.detalhesPedido')
            ->orderBy('created_at', 'asc')
            ->get()
            ->find($id);
        
        return view('usuarios.pedido.index', compact('usuario'));
    }
}
