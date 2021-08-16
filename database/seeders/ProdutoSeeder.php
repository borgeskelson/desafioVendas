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
                'nome' => 'Biscoito Laminado Ninfa - 370g',
                'preco' => 5.00,
                'quantidade' => 5,
                'url_imagem' => 'biscoito-laminado-ninfa.png'
            ],
            [
                'nome' => 'Álcool 70% Guimarães - 1L',
                'preco' => 8.90,
                'quantidade' => 10,
                'url_imagem' => 'alcool-70-guimaraes.png'
            ],
            [
                'nome' => 'Queijo Minas Meia Cura Scala - 500g',
                'preco' => 56.00,
                'quantidade' => 15,
                'url_imagem' => 'queijo-minas-meia-cura-skala.png'
            ],
            [
                'nome' => 'Lava Roupas Tixan Ypê - 1L',
                'preco' => 12.00,
                'quantidade' => 20,
                'url_imagem' => 'lava-roupas-tixan-ype.png'
            ],
            [
                'nome' => 'Feijão Carioca Kicaldo - 1kg',
                'preco' => 6.50,
                'quantidade' => 25,
                'url_imagem' => 'feijao-carioca-kicaldo.png'
            ],
            [
                'nome' => 'Cenoura (kg)',
                'preco' => 3.80,
                'quantidade' => 30,
                'url_imagem' => 'cenoura-granel.png'
            ]
        ];

        foreach ($produtos as $produto) {
            Produto::create(array(
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'quantidade' => $produto['quantidade'],
                'url_imagem' => $produto['url_imagem']
            ));
        }
    }
}
