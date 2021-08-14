<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DetalhePedido extends Pivot
{
    protected $table = "detalhe_pedido";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pedido',
        'id_produto',
        'preco_produto',
        'qtd_produto'
    ];

}
