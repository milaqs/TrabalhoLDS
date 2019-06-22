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
                        <h3 class="text-center">Histórico de aprovações de salas</h3>
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
                            <th scope="col">Status</th>
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
                        @if ($registro->status != 'aguardando')
                            <td><button class="btn {{($registro->status == 'aprovado') ? 'btn-success' : 'btn-danger'}}" disabled>{{ $registro->status }} </button></td>
                        @else
                            <td><button class="btn btn-warning" disabled>{{ $registro->status }} </button></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection