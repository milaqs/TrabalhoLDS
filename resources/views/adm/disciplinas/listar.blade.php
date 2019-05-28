@extends('layout.site')

@section('titulo', 'Lista disciplinas')

@section('conteudo')
<link href="{{asset('css/app.css')}}" rel="stylesheet" />
<link href="{{asset('css/lista.css')}}" rel="stylesheet" />
</head>
    <body>
        <div class="content">
            <div class="tabela">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="text-center">Listagem de Disciplinas</h3>
                    </div>
                    <div class="col-md-2 pull-right">
                        <form method="get" action="{{route('adm.formAddDisciplina')}}">
                            <button type="submit" class="btn btn-light-blue btn-new">Inserir Novo</button>
                        </form>
                    </div>
                </div>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Curso pertencente</th>
                            <th scope="col">Carga Horária</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    @foreach($registros as $registro)
                    <tr scope="row">
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->nome_disciplina }}</td>
                        <td>{{ $registro->nome_curso }}</td>
                        <td>{{ $registro->carga_horaria}} </td>
                        <td><a class="btn btn-warning" href="{{route('adm.formAttDisciplina', $registro->id)}}">Editar</a></td>
                        <td><a class="btn btn-danger" href="{{route('adm.deletaDisciplina', $registro->id)}}">Deletar</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection