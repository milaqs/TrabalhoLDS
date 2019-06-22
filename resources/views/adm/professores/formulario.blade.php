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
                    @csrf
                    <input type="hidden" name="tipo" value="professor"/>

                    <div class="form-group has-feedback">
                        <p class="title"> Nome do professor:</p>
                        <input id="nome" name="nome" autofocus type="text" placeholder="Nome" required
                            value="{{ isset($professores->nome)  ? $professores->nome  : '' }}"
                            class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}">
                        @if($errors->has('nome'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nome') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                        <p class="title"> Prontuário:</p>
                        <input id="gu" name="prontuario" type="text" placeholder="GU0000000" 
                        {{isset($professores->prontuario) ? 'disabled' : '' }} required
                            value="{{ isset($professores->prontuario)  ? $professores->prontuario  : '' }}"
                            class="form-control {{ $errors->has('prontuario') ? 'is-invalid' : '' }}">
                            @if($errors->has('prontuario'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('prontuario') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group has-feedback">
                        <p class="title"> E-mail acadêmico:</p>
                        <input id="email" name="email" type="email" placeholder="usuario@ifsp.edu.br" 
                        {{isset($professores->email) ? 'disabled' : '' }} required
                            value="{{ isset($professores->email)  ? $professores->email  : '' }}"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mt-lg btn-lg">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection