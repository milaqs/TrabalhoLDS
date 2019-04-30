@extends('layout.site')

@section('titulo', 'Lista Professores')

@section('conteudo')
    <h3>Lista de Professores </h3>
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
            <td>{{ $registro->prontuario_professor }}</td>
            <td>{{ $registro->nome_professor }}</td>
            <td>{{ $registro->email_professor }}</td>
            <td><a class="btn deep-orange" href="{{route('adm.formAttProfessor', $registro->id)}}">Editar</a></td>
            <td><a class="btn red" href="{{route('adm.deletaProfessor', $registro->id)}}">Deletar</a></td>
        </tr>
        @endforeach


    </table>
@endsection