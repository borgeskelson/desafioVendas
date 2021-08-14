<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = [
            [
                'nome' => 'Produto 01',
                'preco' => 10.00,
                'quantidade' => 50
            ],
            [
                'nome' => 'Produto 02',
                'preco' => 50.00,
                'quantidade' => 10
            ],
            [
                'nome' => 'Produto 03',
                'preco' => 100.00,
                'quantidade' => 5
            ]
        ];

        foreach ($produtos as $produto) {
            Produto::create(array(
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'quantidade' => $produto['quantidade']
            ));
        }
    }
}
