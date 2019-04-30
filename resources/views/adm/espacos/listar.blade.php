@extends('layout.site')

@section('titulo', 'Lista Espaços')

@section('conteudo')
    <h3>Lista de discplinas </h3>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Capacidade</th>
                <th>Descricação</th>
            </tr>
        </thead>
        @foreach($registros as $registro)
        <tr>
            <td>{{ $registro->id }}</td>
            <td>{{ $registro->nome_espaco }}</td>
            <td>{{ $registro->capacidade_espaco }}</td>
            <td>{{ $registro->descricao_espaco }}</td>
            <td><a class="btn deep-orange" href="{{route('adm.formAttEspaco', $registro->id)}}">Editar</a></td>
            <td><a class="btn red" href="{{route('adm.deletaEspaco', $registro->id)}}">Deletar</a></td>
        </tr>
        @endforeach


    </table>
@endsection