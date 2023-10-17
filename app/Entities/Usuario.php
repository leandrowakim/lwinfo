<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Usuario extends Entity
{
    protected $datamap = [];
    protected $dates   = [];
    protected $casts   = [];

    public function verificaPassword(string $password):bool
    {
        return password_verify($password, $this->password_hash);
    }
   
}
