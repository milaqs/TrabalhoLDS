@extends('layout.site')

@section('titulo', 'Login servidores')

@section('conteudo')
<link href="{{asset('css/usuario.css')}}" rel="stylesheet" />
    </head>
    <body class="fundo">
        <div>
            <div class="panel panel-dark panel-flat">
                <div class="panel-body">
                    <p class="text-center pv">Login Servidores</p>
                    <form method="POST" action="{{ $caminho }}">
                        {{ csrf_field() }}
                        @if(isset($message))
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @endif
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
                        <button type="submit" class="btn btn-block btn-primary mt-lg btn-lg">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
@endsection