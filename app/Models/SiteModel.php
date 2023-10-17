<?php

namespace App\Models;

use CodeIgniter\Model;

class SiteModel extends Model
{
    protected $table            = 'sites';
    protected $returnType       = 'App\Entities\Sites';
    protected $allowedFields    = [
        'nome',
        'imagem',
        'url',
    ];
}
