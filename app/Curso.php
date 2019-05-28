<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nome_curso', 'descricao_curso', 'nivel_curso',
    ];
}
