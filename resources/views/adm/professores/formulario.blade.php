@extends('layout.site')

@section('titulo', 'Formulario professores')

@section('conteudo')
<link href="{{asset('css/usuario.css')}}" rel="stylesheet" />
</head>
<body class="fundo">
    <div>
        <div class="panel panel-dark panel-flat">
            <div class="panel-body">
                <p class="text-center pv">Cadastro de Professores</p>
                <form method="POST" action="{{ $caminho }}">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback">
                        <p class="title"> Nome do professor:</p>
                        <input id="nome" name="nome_professor" autofocus type="text" placeholder="Nome" required
                            value="{{ isset($professores->nome_professor)  ? $professores->nome_professor  : '' }}"
                            class="form-control {{ $errors->has('nome_professor') ? 'is-invalid' : '' }}">
                        @if($errors->has('nome_professor'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nome_professor') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <p class="title"> Prontuário:</p>
                        <input id="gu" name="prontuario_professor" type="text" placeholder="GU0000000" required
                            value="{{ isset($professores->prontuario_professor)  ? $professores->prontuario_professor  : '' }}"
                            class="form-control {{ $errors->has('prontuario_professor') ? 'is-invalid' : '' }}">
                            @if($errors->has('prontuario_professor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('prontuario_professor') }}
                                </div>
                            @endif
                    </div>
                    <div class="form-group has-feedback">
                        <p class="title"> E-mail acadêmico:</p>
                        <input id="email" name="email_professor" type="email" placeholder="usuario@ifsp.edu.br" required
                            value="{{ isset($professores->email_professor)  ? $professores->email_professor  : '' }}"
                            class="form-control {{ $errors->has('email_professor') ? 'is-invalid' : '' }}">
                            @if($errors->has('email_professor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email_professor') }}
                                </div>
                            @endif
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mt-lg btn-lg">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection