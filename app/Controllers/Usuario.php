<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Usuario extends BaseController
{
    private $userModel;

    public function __construct() {
        $this->userModel = new \App\Models\UsuarioModel();
    }

    public function index()
    {
        $data = [
            'titulo' => 'Área Restrita'
        ];

        return view('Restrict/restrict', $data);
    }
    
}
