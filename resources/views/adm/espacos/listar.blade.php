@extends('layout.site')

@section('titulo', 'Lista Espaços')

@section('conteudo')
<link href="{{asset('css/app.css')}}" rel="stylesheet" />
<link href="{{asset('css/lista.css')}}" rel="stylesheet" />
</head>
    <body>
        <div class="content">
            <div class="tabela">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="text-center">Listagem de Espaços</h3>
                    </div>
                    <div class="col-md-2 pull-right">
                        <form method="get" action="{{route('adm.formAddEspaco')}}">
                            <button type="submit" class="btn btn-light-blue btn-new">Inserir Novo</button>
                        </form>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Capacidade</th>
                            <th scope="col">Descricação</th>
                            <th scope="col">Acessivel a cadeirantes</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    @foreach($registros as $registro)
                    <tr scope="row">
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->nome_espaco }}</td>
                        <td>{{ $registro->capacidade_espaco }}</td>
                        <td>{{ $registro->descricao_espaco }}</td>
                        <td>{{ ($registro->acessibilidade)? 'sim' : 'não'}}</td>
                        <td><a class="btn btn-warning" href="{{route('adm.formAttEspaco', $registro->id)}}">Editar</a></td>
                        <td><a class="btn btn-danger" onClick="return confirm('Quer mesmo deletar esse registro?')" href="{{route('adm.deletaEspaco', $registro->id)}}">Deletar</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection