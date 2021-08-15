<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedido";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario',
        'finalizado'
    ];

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario');
    }
}
