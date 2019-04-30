<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = [
        'nome_disciplina', 'curso_disciplina', 'carga_horaria',
    ];
}
