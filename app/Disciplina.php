<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = [
        'nome_disciplina', 'id_curso', 'carga_horaria', 'semestre',
    ];
}
