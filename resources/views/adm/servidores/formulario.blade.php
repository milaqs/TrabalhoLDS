@extends('layout.site')

@section('titulo', 'Formulario servidores')

@section('conteudo')
<link href="{{asset('css/usuario.css')}}" rel="stylesheet" />
    </head>
    <body class="fundo">
        <div>
            <div class="panel panel-dark panel-flat">
                <div class="panel-body">
                    <p class="text-center pv">Servidor</p>
                    <form method="POST" action="{{ $caminho }}">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <p class="title"> Nome do usuário:</p>
                            <input id="nome" name="nome" autofocus type="text" placeholder="Nome" required
                                value="{{ isset($servidores->nome)  ? $servidores->nome  : '' }}"
                                class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}">
                            @if($errors->has('nome'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nome') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback">
                            <p class="title"> E-mail acadêmico:</p>
                            <input id="email" name="email" type="email" placeholder="usuario@ifsp.edu.br" required
                                value="{{ isset($servidores->email)  ? $servidores->email  : '' }}"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                        </div>
                        <div class="form-group has-feedback">
                            <p class="title"> Prontuário:</p>
                            <input id="gu" name="prontuario" type="text" placeholder="GU0000000" required
                                value="{{ isset($servidores->prontuario)  ? $servidores->prontuario  : '' }}"
                                class="form-control {{ $errors->has('prontuario') ? 'is-invalid' : '' }}">
                                @if($errors->has('prontuario'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('prontuario') }}
                                    </div>
                                @endif
                            <div class="form-group has-feedback">
                            <p class="title">Senha:</p>
                            <input id="senha" name="senha" type="password" placeholder="Senha" required
                                value="{{ isset($servidores->senha)  ? $servidores->senha  : '' }}"
                                class="form-control {{ $errors->has('senha') ? 'is-invalid' : '' }}">
                                @if($errors->has('senha'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('senha') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" id="tipo_usuario" name="tipo" value="servidor" />
                        <button type="submit" class="btn btn-block btn-primary mt-lg btn-lg">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
@endsection