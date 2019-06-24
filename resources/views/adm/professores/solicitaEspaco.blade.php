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
                <form method="POST" action="{{route('adm.registraSolicitacao')}}">
                    @csrf

                    <input type="hidden" name="id_professor" value="{{$usuario_id}}"/>
                    <div class="form-group has-feedback">
                            <p class="title"> Espaço:</p>
                            <select name="id_espaco">
                                @foreach($espacos as $espaco)
                                <tr scope="row">
                                        <option value="{{$espaco->id}}" >{{$espaco->nome_espaco}}</option>
                                @endforeach
                                </tr>
                            </select>
                    </div>

                    <div class="form-group has-feedback">
                            <p class="title"> Curso:</p>
                            <select name="id_curso">
                                @foreach($cursos as $curso)
                                <tr scope="row">
                                        <option value="{{$curso->id}}" >{{$curso->nome_curso}}</option>
                                @endforeach
                                </tr>
                            </select>
                    </div>

                    <div class="form-group has-feedback">
                            <p class="title"> Disciplina:</p>
                            <select name="id_disciplina">
                                @foreach($disciplinas as $disciplina)
                                <tr scope="row">
                                        <option value="{{$disciplina->id}}" >{{$disciplina->nome_disciplina}}</option>
                                @endforeach
                                </tr>
                            </select>
                    </div>
                    
                    <div class="form-group has-feedback">
                        <p class="title"> Semestre:</p>
                        <select name="semestre">
                        @for($i = 1; $i <= 12; $i++)
                            <option value="{{$i}}"> {{$i}} Semestre</option>
                        @endfor
                        </select>
                    </div>

                    <div class="form-group has-feedback">
                        <p class="title">Dia da semana</p>
                        <select name="dia_semana">
                            <option disable>Selecione o dia da semana</option>
                            <option value="1">Segunda</option>
                            <option value="2">Terça</option>
                            <option value="3">Quarta</option>
                            <option value="4">Quinta</option>
                            <option value="5">Sexta</option>
                            <option value="6">Sábado</option>
                        </select>
                    </div>

                    <div class="form-group has-feedback">
                        <p class="title"> Horario de inicio:</p>
                        <input id="horario_inicio" name="horario_inicio" type="time" required>
                    </div>

                    <div class="form-group has-feedback">
                        <p class="title"> Hora final:</p>
                        <input id="horario_final" name="horario_final" type="time" required>
                    </div>

                   <br>
                    <button type="submit" class="btn btn-block btn-primary mt-lg btn-lg">Solicitar</button>
                </form>
            </div>
        </div>
    </div>
@endsection