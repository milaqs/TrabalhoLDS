@extends('layout.site')

@section('titulo', 'Formulario espaços')

@section('conteudo')
    <link href="{{asset('css/usuario.css')}}" rel="stylesheet" />
    </head>
    <body class="fundo">
        <div>
            <div class="panel panel-dark panel-flat">
                    <div class="panel-body">
                        <p class="text-center pv">Cadastro de Espaço</p>
                        <form method="POST" action="{{ $caminho }}">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <p class="title"> Nome do espaço:</p>
                                <input id="nome" name="nome_espaco" autofocus type="text" placeholder="Nome do local" required
                                    value="{{ isset($espacos->nome_espaco)  ? $espacos->nome_espaco  : '' }}"
                                class="form-control {{ $errors->has('nome_espaco') ? 'is-invalid' : '' }}">
                                @if($errors->has('nome_espaco'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nome_espaco') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <p class="title">Descrição:</p>
                                <input id="descricao" name="descricao_espaco" type="text" placeholder="Descrição do espaço" required
                                    value="{{ isset($espacos->descricao_espaco)  ? $espacos->descricao_espaco  : '' }}"
                                    class="form-control {{ $errors->has('descricao_espaco') ? 'is-invalid' : '' }}">
                                @if($errors->has('descricao_espaco'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('descricao_espaco') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <p class="title">Capacidade do local: </p>
                                <input id="qtd" name="capacidade_espaco" type="number" placeholder="Quantidade máxima de alunos" required min="0"
                                    value="{{ isset($espacos->capacidade_espaco)  ? $espacos->capacidade_espaco  : '' }}"
                                    class="form-control {{ $errors->has('capacidade_espaco') ? 'is-invalid' : '' }}">
                                @if($errors->has('capacidade_espaco'))   
                                    <div class="invalid-feedback">
                                        {{ $errors->first('capacidade_espaco') }}
                                    </div>
                                @endif 
                            </div>
                            <button type="submit" class="btn btn-block btn-primary mt-lg btn-lg">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
@endsection