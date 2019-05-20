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
                        <h3 class="text-center">Lista de Salas Solicitadas para aprovação</h3>
                    </div>
                </div>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Sala</th>
                            <th scope="col">Professor</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Aprovar</th>
                            <th scope="col">Reprovar</th>
                        </tr>
                    </thead>
                    @foreach($registros as $registro)
                    <tr scope="row">
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->xxx }}</td>
                        <td>{{ $registro->nome_servidor }}</td>
                        <td>{{ $registro->xxx }}</td>
                        <td>{{ $registro->xxx }}</td>
                        <td><a class="btn deep-orange" href="{{route('adm.xxx', $registro->id)}}">Aprovar</a></td>
                        <td><a class="btn red" href="{{route('adm.xxx', $registro->id)}}">Reprovar</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection