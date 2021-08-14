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
                'nome' => 'Usuario 01',
                'email' => 'usuario01@teste.com',
                'cpf' => '00100100101'
            ],
            [
                'nome' => 'Usuario 02',
                'email' => 'usuario02@teste.com',
                'cpf' => '00200200202'
            ],
            [
                'nome' => 'Usuario 03',
                'email' => 'usuario03@teste.com',
                'cpf' => '00300300303'
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
