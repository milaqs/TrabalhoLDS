<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espaco extends Model
{
    protected $fillable = [
        'nome_espaco', 'capacidade_espaco', 'descricao_espaco', 'acessibilidade'
    ];
}
