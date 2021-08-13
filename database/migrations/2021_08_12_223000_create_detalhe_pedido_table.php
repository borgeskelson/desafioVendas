<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalhePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhe_pedido', function (Blueprint $table) {
            $table->integer('id_pedido')->unsigned();
            $table->foreign('id_pedido')->references('id')->on('pedido');
            $table->integer('id_produto')->unsigned();
            $table->foreign('id_produto')->references('id')->on('produto');
            $table->primary(array('id_pedido', 'id_produto'));
            $table->decimal('preco_produto', 6, 2)->default(0.00);
            $table->integer('qtd_produto')->default(0);
            $table->boolean('excluido')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalhe_pedido');
    }
}
