@extends('layout.site')

@section('titulo', 'Lista Professores')

@section('conteudo')

<link href="{{asset('css/app.css')}}" rel="stylesheet" />
<link href="{{asset('css/lista.css')}}" rel="stylesheet" />
</head>
    <body>
        <div class="content">
            <div class="tabela">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="text-center">Listagem de Professores</h3>
                    </div>
                    <div class="col-md-2 pull-right">
                        <form method="get" action="{{route('adm.formAddProfessor')}}">
                            <button type="submit" class="btn btn-light-blue btn-new">Inserir Novo</button>
                        </form>
                    </div>
                </div>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Prontuário</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    @foreach($registros as $registro)
                    <tr scope="row">
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->prontuario }}</td>
                        <td>{{ $registro->nome }}</td>
                        <td>{{ $registro->email }}</td>
                        <td><a class="btn btn-warning" href="{{route('adm.formAttProfessor', $registro->id)}}">Editar</a></td>
                        <td><a class="btn btn-danger" onClick="return confirm('Quer mesmo deletar esse registro?')" href="{{route('adm.deletaProfessor', $registro->id)}}">Deletar</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection