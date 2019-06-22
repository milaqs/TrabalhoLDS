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
                        
                        @if(isset($usuario->id))
                        <input type="hidden" name="id" value="{{$usuario->id}}" >
                        @endif


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
                            <p class="title"> Curso pertencente:</p>
                            <select name="id_curso">
                                @foreach($cursos as $curso)
                                <option value="{{$curso->id}}"
                                @php 
                                    if (isset($usuario->id_curso)) 
                                        echo ($usuario->id_curso == $curso->id) ? 'selected' : '';
                                @endphp>{{$curso->nome_curso}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group has-feedback">
                            <p class="title"> Carga horária:</p>
                            <input id="carga_horaria" name="carga_horaria" type="number" step="any" min="1" placeholder="Carga Horária" required
                                value="{{ isset($usuario->carga_horaria)  ? $usuario->carga_horaria  : '' }}"
                                class="form-control {{ $errors->has('carga_horaria') ? 'is-invalid' : '' }}">
                                @if($errors->has('carga_horaria'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('carga_horaria') }}
                                    </div>
                                @endif
                        </div>

                        <div class="form-group has-feedback">
                            <p class="title"> Semestre:</p>
                            <select name="semestre">
                            @for($i = 1; $i <= 12; $i++)
                                <option value="{{$i}}" 
                                @php 
                                    if(isset($usuario->semestre))
                                    echo ($usuario->semestre == $i) ? 'selected' : '';
                                @endphp>{{ $i }}º</option>    
                            @endfor
                            </select>
                        </div>

                        <br>
    <button type="submit" value="salvar"> Salvar </button>
    </form>
@endsection