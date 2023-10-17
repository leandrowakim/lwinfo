<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    public function run()
    {
        $userModel = new \App\Models\UsuarioModel();
        $user = [
            'nome' => 'Leandro Wakim',
            'email' => 'leandrowakim@gmail.com',
            'password' => 'lrws',
        ];
        $userModel->skipValidation(true)->insert($user);
        
        echo 'Usuário Admin semeado com sucesso!';
    }
}
