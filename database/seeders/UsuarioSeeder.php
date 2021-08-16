<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
            [
                'nome' => 'Fulano',
                'email' => 'fulano@vendas.com',
                'cpf' => '11122233300'
            ],
            [
                'nome' => 'Beltrano',
                'email' => 'beltrano@vendas.com',
                'cpf' => '44455566600'
            ],
            [
                'nome' => 'Sicrano',
                'email' => 'sicrano@vendas.com',
                'cpf' => '77788899900'
            ]
        ];

        foreach ($usuarios as $usuario) {
            Usuario::create(array(
                'nome' => $usuario['nome'],
                'email' => $usuario['email'],
                'cpf' => $usuario['cpf']
            ));
        }
    }
}
