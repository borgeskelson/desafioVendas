<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalhePedido extends Model
{
    protected $table = "detalhe_pedido";
    protected $primaryKey = "id";

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
    
    public function pedido() {
        return $this->belongsTo('App\Models\Pedido');
    }

    public function produto() {
        return $this->belongsTo('App\Models\Produto');
    }
}
