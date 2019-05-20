@extends('layout.site')

@section('titulo', 'Formulario disciplinas')

@section('conteudo')
<link href="{{asset('css/usuario.css')}}" rel="stylesheet" />
    </head>
    <body class="fundo">
        <div>
            <div class="panel panel-dark panel-flat">
                <div class="panel-body">
                <p class="text-center pv">Cadastro de Disciplinas</p>
                <form method="POST" action="{{ $caminho }}">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <p class="title"> Nome da disciplina:</p>
                            <input id="nome" name="nome_disciplina" autofocus type="text" placeholder="Nome da disciplina" required
                                value="{{ isset($servidores->nome_disciplina)  ? $servidores->nome_disciplina  : '' }}"
                                class="form-control {{ $errors->has('nome_disciplina') ? 'is-invalid' : '' }}">
                                @if($errors->has('nome_disciplina'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nome_disciplina') }}
                                    </div>
                                @endif
                        </div>
                        <div class="form-group has-feedback">
                            <p class="title"> Curso pertecente:</p>
                            <select name="curso_disciplina">
                                <option value="ADS">Tecnologia em Análise e Desenvolvimento de Sistemas</option>
                                <option value="MAT">Licenciatura em Matemática</option>
                                <option value="TAI">Tecnologia em Automação Industrial</option>
                                <option value="GSI">Pós-Graduação em Gestão de Sistemas de Informação</option>
                                <option value="ECA">Engenharia de Controle e Automação</option>
                                <option value="TecII">Técnico em Informática para Internet</option>
                                <option value="TecAI">Técnico em Automação Industrial</option>
                                <option value="TecMS">Ténico em Manutenção e Suporte em Informática</option>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <p class="title"> Carga horária:</p>
                            <select name="curso_disciplina">
                                <option value="1">1 AULA - 50min</option>
                                <option value="2">2 AULAS - 1h40min</option>
                                <option value="3">3 AULAS - 2h30min</option>
                                <option value="4">4 AULAS - 3h20min</option>
                                <option value="5">5 AULAS - 4h10min</option>
                                <option value="6">6 AULAS - 5h</option>
                            </select>
                        </div>
                        <br>
    <!-- <input name="nome_disciplina" type="text" placeholder="Nome da disciplina" value="{{ isset($disciplinas->nome_disciplina)  ? $disciplinas->nome_disciplina  : '' }}" /><br/> -->
    <!-- <input name="curso_disciplina" type="text" placeholder="Curso que pertence" value="{{ isset($disciplinas->curso_disciplina) ? $disciplinas->curso_disciplina : '' }}" /><br/>   MUDAR PARA SELECT OU ALGO PARECIDO -->
    <!-- <input name="carga_horaria" type="number" placeholder="Carga horária" value="{{ isset($disciplinas->carga_horaria) ? $disciplinas->carga_horaria : '' }}" /><br/><br/> TALVEZ UM SELECT COM HORÁRIOS DEFINIDOS... -->
    <button type="submit" value="salvar"> Salvar </button>
    </form>
@endsection