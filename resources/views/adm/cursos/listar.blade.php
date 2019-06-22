@extends('layout.site')

@section('titulo', 'Lista Cursos')

@section('conteudo')

<link href="{{asset('css/app.css')}}" rel="stylesheet" />
<link href="{{asset('css/lista.css')}}" rel="stylesheet" />
</head>
    <body>
        <div class="content">
            <div class="tabela">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="text-center">Listagem de Cursos</h3>
                    </div>
                    <div class="col-md-2 pull-right">
                        <form method="get" action="{{route('adm.formAddCurso')}}">
                            <button type="submit" class="btn btn-light-blue btn-new">Inserir Novo</button>
                        </form>
                    </div>
                </div>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Nível</th>
                        </tr>
                    </thead>
                    @foreach($registros as $curso)
                    <tr scope="row">
                        <td>{{ $curso->id }}</td>
                        <td>{{ $curso->nome_curso }}</td>
                        <td>{{ $curso->descricao_curso }}</td>
                        <td>{{ $curso->nivel_curso}} </td>
                        <td><a class="btn btn-warning" href="{{route('adm.formAttCurso', $curso->id)}}">Editar</a></td>
                        <td><a class="btn btn-danger" onClick="return confirm('Quer mesmo deletar esse registro?')" href="{{route('adm.deletaCurso', $curso->id)}}">Deletar</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection