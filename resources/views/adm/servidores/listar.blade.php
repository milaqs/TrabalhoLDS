@extends('layout.site')

@section('titulo', 'Lista Servidores')

@section('conteudo')
    <h3>Lista de Servidores </h3>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Prontuário</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        @foreach($registros as $registro)
        <tr>
            <td>{{ $registro->id }}</td>
            <td>{{ $registro->prontuario_servidor }}</td>
            <td>{{ $registro->nome_servidor }}</td>
            <td>{{ $registro->email_servidor }}</td>
            <td><a class="btn deep-orange" href="{{route('adm.formAttServidor', $registro->id)}}">Editar</a></td>
            <td><a class="btn red" href="{{route('adm.deletaServidor', $registro->id)}}">Deletar</a></td>
        </tr>
        @endforeach


    </table>
@endsection