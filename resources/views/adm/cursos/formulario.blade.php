@extends('layout.site')

@section('titulo', 'Formulario Cursos')

@section('conteudo')

@php
    $nivel_de_cursos = array('Bacharelado', 'Ensino médio', 'Licenciatura', 'Pós-Graduacao', 'Técnico', 'Tecnólogo');
@endphp

<link href="{{asset('css/usuario.css')}}" rel="stylesheet" />
    </head>
    <body class="fundo">
        <div>
            <div class="panel panel-dark panel-flat">
                <div class="panel-body">
                <p class="text-center pv">Cadastro de Cursos</p>
                <form method="POST" action="{{ $caminho }}">
                        @csrf
                        
                        @if(isset($curso->id))
                        <input type="hidden" name="id" value="{{$curso->id}}" >
                        @endif


                        <div class="form-group has-feedback">
                            <p class="title"> Nome do Curso:</p>
                            <input id="nome" name="nome_curso" autofocus type="text" placeholder="Nome do curso" required
                                value="{{ isset($curso->nome_curso)  ? $curso->nome_curso  : '' }}"
                                class="form-control {{ $errors->has('nome_curso') ? 'is-invalid' : '' }}">
                                @if($errors->has('nome_curso'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nome_curso') }}
                                    </div>
                                @endif
                        </div>
                        
                        <div class="form-group has-feedback">
                            <p class="title"> Descrição do Curso:</p>
                            <input id="nome" name="descricao_curso" autofocus type="text" placeholder="Descrição do curso" required
                                value="{{ isset($curso->descricao_curso)  ? $curso->descricao_curso  : '' }}"
                                class="form-control {{ $errors->has('descricao_curso') ? 'is-invalid' : '' }}">
                                @if($errors->has('descricao_curso'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('descricao_curso') }}
                                    </div>
                                @endif
                        </div>
                        
                        <div class="form-group has-feedback">
                            <p class="title"> Nível do curso:</p>
                            <select name="nivel_curso">
                                @for($i = 0; $i < sizeof($nivel_de_cursos); $i++)
                                <option value="{{$nivel_de_cursos[$i]}}"
                                @php 
                                    if (isset($curso->nivel_curso))
                                        echo ($curso->nivel_curso == $nivel_de_cursos[$i]) ? 'selected' : '';
                                @endphp>{{$nivel_de_cursos[$i]}}</option>
                                @endfor
                            </select>
                        </div>

                        <br>
    <button type="submit" value="salvar"> Salvar </button>
    </form>
    
@endsection