<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
        'prontuario_professor', 'nome_professor', 'email_professor',
    ];
}
