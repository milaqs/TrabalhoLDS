<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    protected $table = "servidors";
    protected $fillable = [
        'prontuario_servidor', 'nome_servidor', 'email_servidor', 'senha_servidor'
    ];
}
