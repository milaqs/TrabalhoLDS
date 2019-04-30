<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    protected $fillable = [
        'prontuario_servidor', 'nome_servidor', 'email_servidor',
    ];
}
