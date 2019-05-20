@extends('layout.site')

@section('titulo', 'Formulario servidores')

@section('conteudo')
<link href="{{asset('css/usuario.css')}}" rel="stylesheet" />
    </head>
    <body class="fundo">
        <div>
            <div class="panel panel-dark panel-flat">
                <div class="panel-body">
                    <p class="text-center pv">Cadastro de Servidor</p>
                    <form method="POST" action="{{ $caminho }}">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <p class="title"> Nome do usuário:</p>
                            <input id="nome" name="nome_servidor" autofocus type="text" placeholder="Nome" required
                                value="{{ isset($servidores->nome_servidor)  ? $servidores->nome_servidor  : '' }}"
                                class="form-control {{ $errors->has('nome_servidor') ? 'is-invalid' : '' }}">
                            @if($errors->has('nome_servidor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nome_servidor') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback">
                            <p class="title"> E-mail acadêmico:</p>
                            <input id="email" name="email_servidor" type="email" placeholder="usuario@ifsp.edu.br" required
                                value="{{ isset($servidores->email_servidor)  ? $servidores->email_servidor  : '' }}"
                                class="form-control {{ $errors->has('email_servidor') ? 'is-invalid' : '' }}">
                                @if($errors->has('email_servidor'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email_servidor') }}
                                    </div>
                                @endif
                        </div>
                        <div class="form-group has-feedback">
                            <p class="title"> Prontuário:</p>
                            <input id="gu" name="prontuario_servidor" type="text" placeholder="GU0000000" required
                                value="{{ isset($servidores->prontuario_servidor)  ? $servidores->prontuario_servidor  : '' }}"
                                class="form-control {{ $errors->has('prontuario_servidor') ? 'is-invalid' : '' }}">
                                @if($errors->has('prontuario_servidor'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('prontuario_servidor') }}
                                    </div>
                                @endif
                            <div class="form-group has-feedback">
                            <p class="title">Senha:</p>
                            <input id="senha" name="senha_servidor" type="password" placeholder="Senha" required
                                value="{{ isset($servidores->senha_servidor)  ? $servidores->senha_servidor  : '' }}"
                                class="form-control {{ $errors->has('senha_servidor') ? 'is-invalid' : '' }}">
                                @if($errors->has('senha_servidor'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('senha_servidor') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary mt-lg btn-lg">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
@endsection