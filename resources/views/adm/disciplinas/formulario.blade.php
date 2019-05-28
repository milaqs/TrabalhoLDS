@extends('layout.site')

@section('titulo', 'Formulario disciplinas')

@section('conteudo')

@php
    $carga_horaria = array("1 AULA", "2 AULAS", "3 AULAS", "4 AULAS", "5 AULAS", "6 AULAS");
@endphp

<link href="{{asset('css/usuario.css')}}" rel="stylesheet" />
    </head>
    <body class="fundo">
        <div>
            <div class="panel panel-dark panel-flat">
                <div class="panel-body">
                <p class="text-center pv">Cadastro de Disciplinas</p>
                <form method="POST" action="{{ $caminho }}">
                        @csrf
                        <div class="form-group has-feedback">
                            <p class="title"> Nome da disciplina:</p>
                            <input id="nome" name="nome_disciplina" autofocus type="text" placeholder="Nome da disciplina" required
                                value="{{ isset($usuario->nome_disciplina)  ? $usuario->nome_disciplina  : '' }}"
                                class="form-control {{ $errors->has('nome_disciplina') ? 'is-invalid' : '' }}">
                                @if($errors->has('nome_disciplina'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nome_disciplina') }}
                                    </div>
                                @endif
                        </div>
                        <div class="form-group has-feedback">
                            <p class="title"> Curso pertecente:</p>
                            <select name="id_disciplina">
                                @foreach($disciplinas as $disciplina)
                                <option value="{{$disciplina->id_curso}}"
                                @php 
                                    if (isset($usuario->id_curso)) 
                                        echo ($usuario->id_curso == $disciplina->id_curso) ? 'selected' : '';
                                @endphp>{{$disciplina->nome_curso}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <p class="title"> Carga horária:</p>
                            <select name="carga_horaria">
                            @for($i = 0; $i < sizeof($carga_horaria); $i++)
                                <option value="{{$i+1}}" 
                                @php 
                                    if(isset($usuario->carga_horaria))
                                    echo ($usuario->carga_horaria == $i+1) ? 'selected' : '';
                                @endphp>{{ $carga_horaria[$i] }}</option>    
                            @endfor
                            </select>

                        </div>
                        <br>
    <button type="submit" value="salvar"> Salvar </button>
    </form>
@endsection