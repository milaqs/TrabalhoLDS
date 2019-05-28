@extends('layout.site')

@section('titulo', 'Lista Servidores')

@section('conteudo')

<link href="{{asset('css/app.css')}}" rel="stylesheet" />
<link href="{{asset('css/lista.css')}}" rel="stylesheet" />
</head>
    <body>
        <div class="content">
            <div class="tabela">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="text-center">Lista de Salas Solicitadas</h3>
                    </div>
                </div>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Espaço</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Disciplina</th>
                            <th scope="col">Professor</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Data</th>
                            <th scope="col">Horario inicio</th>
                            <th scope="col">Horario final</th>
                            <th scope="col" colspan="2" style="text-align: center;">Status</th>
                        </tr>
                    </thead>
                    @foreach($registros as $registro)
                    <tr scope="row">
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->id_espaco }}</td>
                        <td>{{ $registro->id_curso }}</td>
                        <td>{{ $registro->id_disciplina }}</td>
                        <td>{{ $registro->id_professor }}</td>
                        <td>{{ $registro->semestre }}</td>
                        <td>{{ $registro->data }}</td>
                        <td>{{ $registro->horario_inicio}}</td>
                        <td>{{ $registro->horario_final }}</td>
                        <td><a class="btn btn-warning" href="aprovarSolicitacoes/{{$registro->id}}/aprovado">Aprovar</a></td>
                        <td><a class="btn btn-danger"  href="aprovarSolicitacoes/{{$registro->id}}/reprovado">Reprovar</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection