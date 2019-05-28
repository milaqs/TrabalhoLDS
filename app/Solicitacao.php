<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    protected $fillable = [
        'id_espaco', 'id_curso', 'id_disciplina', 'id_professor', 'semestre', 'data', 'horario_inicio', 'horario_final', 'status',
    ];
}
