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
                            <th scope="col">Semestre</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    @foreach($registros as $disciplina)
                    <tr scope="row">
                        <td>{{ $disciplina->id }}</td>
                        <td>{{ $disciplina->nome_disciplina }}</td>
                        <td>{{ $disciplina->nome_curso }}</td>
                        <td>{{ $disciplina->carga_horaria}} </td>
                        <td>{{ $disciplina->semestre }}º </td>
                        <td><a class="btn btn-warning" href="{{route('adm.formAttDisciplina', $disciplina->id)}}">Editar</a></td>
                        <td><a class="btn btn-danger" onClick="return confirm('Quer mesmo deletar esse registro?')" href="{{route('adm.deletaDisciplina', $disciplina->id)}}">Deletar</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection