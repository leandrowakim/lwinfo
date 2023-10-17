<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipeModel extends Model
{
    protected $table            = 'equipe';
    protected $allowedFields    = [
        'nome',
        'imagem',
        'descricao',
    ];
}
