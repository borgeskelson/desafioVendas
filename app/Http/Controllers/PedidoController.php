<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pedido;
use App\Models\DetalhePedido;
use App\Models\Produto;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Verifica se existe pedido em aberto para o usuário, caso contrário cria um novo pedido
        $pedidoUsuario = Pedido::where('id_usuario', $request->id_usuario)
            ->where('finalizado', false)
            ->get()
            ->first();
        
        if ($pedidoUsuario === null) {
            $pedidoUsuario = Pedido::create([
                'id_usuario' => $request->id_usuario
            ]);

            DetalhePedido::create([
                'id_pedido' => $pedidoUsuario->id,
                'id_produto' => $request->id_produto,
                'preco_produto' => $request->preco_produto,
                'qtd_produto' => $request->qtd_produto
            ]);
        } else {
            // Verifica se já existe o produto no pedido do usuário, caso contrário inclui o produto
            $detalhePedidoProduto = DetalhePedido::where('id_pedido', $pedidoUsuario->id)
                ->where('id_produto', $request->id_produto)
                ->get()
                ->first();

            if ($detalhePedidoProduto === null) {
                DetalhePedido::create([
                    'id_pedido' => $pedidoUsuario->id,
                    'id_produto' => $request->id_produto,
                    'preco_produto' => $request->preco_produto,
                    'qtd_produto' => $request->qtd_produto
                ]);
            } else {
                // Atualiza o preço e a quantidade do produto
                $detalhePedidoProduto->preco_produto = $request->preco_produto;
                $detalhePedidoProduto->qtd_produto = ($detalhePedidoProduto->qtd_produto + $request->qtd_produto);
                $detalhePedidoProduto->save();
            }
        }
        
        return redirect('/home')->with('success', 'Produto adicionado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        $usuario = Pedido::with('usuario')->get()->find($pedido->id_usuario);
        $detalhesPedido = DetalhePedido::where('id_pedido', $pedido->id)->get();

        return view('usuarios.pedido.show', compact('pedido', 'usuario', 'detalhesPedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        $usuario = Pedido::with('usuario')->get()->find($pedido->id_usuario);
        $detalhesPedido = DetalhePedido::where('id_pedido', $pedido->id)->get();

        return view('usuarios.pedido.edit', compact('pedido', 'usuario', 'detalhesPedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('_token')) {
            foreach($request->detalhesPedido as $key => $id_detalhe_pedido) {
                $detalhePedido = DetalhePedido::findOrFail($id_detalhe_pedido);
                $detalhePedido->qtd_produto = $request->qtd_produto[$key];
                $detalhePedido->save();
            }
        }

        $pedido = Pedido::findOrFail($id);
        $pedido->update(['finalizado' => true]);

        $detalhesPedido = DetalhePedido::where('id_pedido', $pedido->id)->get();
        foreach($detalhesPedido as $detalhePedido) {
            $produto = Produto::findOrFail($detalhePedido->id_produto);
            $produto->quantidade = ($produto->quantidade - $detalhePedido->qtd_produto);
            $produto->save();
        }

        return redirect()->action(
            [UsuarioController::class, 'indexPedidos'], ['id' => $pedido->id_usuario]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
