<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Session;

class ProdutoController extends Controller
{
    public function index() {
        if (Session::has('usuario')) {
            $usuario = Session::get('usuario');
            $produtos = Produto::orderByRaw("(quantidade > 0) DESC, nome ASC")->get();
            
            return view('home', [
                'usuario' => $usuario,
                'produtos' => $produtos
            ]);
        }
        
        return redirect('/login')->with('error', 'Nenhum usuário definido na sessão!');
    }

    public function create() {
        return view('produtos.create');
    }

    public function store(Request $request) {
        Produto::create([
            'codigo' => $request->codigo,
            'nome' => $request->nome,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade
        ]);

        return "Produto cadastrado com sucesso!";
    }

    public function show($id) {
        $produto = Produto::findOrFail($id);
        return view('produtos.show', ['produto' => $produto]);
    }

    public function edit($id) {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', ['produto' => $produto]);
    }

    public function update(Request $request, $id) {
        $produto = Produto::findOrFail($id);

        $produto->update([
            'codigo' => $request->codigo,
            'nome' => $request->nome,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade
        ]);

        return "Produto atualizado com sucesso!";
    }

    public function delete($id) {
        $produto = Produto::findOrFail($id);
        return view('produtos.delete', ['produto' => $produto]);
    }

    public function destroy($id) {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return "Produto excluído com sucesso!";
    }
}
