<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $returnType       = 'App\Entities\Usuario';
    protected $allowedFields    = [
        'nome',
        'email',
        'password'
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'O campo Nome é Obrigatório!',
            'min_length' => 'O campo Nome deve ser maior que 3 caractéres!',
            'max_length' => 'O campo Nome não pode ser maior que 100 caractéres!'
        ],
        'email' => [
            'required' => 'O campo E-mail é Obrigatório!',
            'max_length' => 'O campo E-mail não pode ser maior que 100 caractéres!',
            'is_unique' => 'Esse E-mail já existe, tente outro!'
        ],
        'password' => [
            'required' => 'O campo Senha é Obrigatório!',
            'min_length' => 'O campo senha deve ser maior que 5 caractéres!',
        ],
        'password_confirmation' => [
            'required_with' => 'Por favor confirme a senha!',
            'matches' => 'As senhas precisam combinar!'
        ],
    ];

    // Callbacks
    protected $beforeInsert   = ['hashPassword'];
    protected $beforeUpdate   = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {

            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

            unset($data['data']['password']);
            unset($data['data']['password_confirmation']);

        }    

        return $data;
    }

    public function buscaUsuarioPorEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }

}
