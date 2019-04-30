@extends('layout.site')

@section('titulo', 'Lista disciplinas')

@section('conteudo')
    <h3>Lista de discplinas </h3>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Curso pertencente</th>
                <th>Carga horária</th>
            </tr>
        </thead>
        @foreach($registros as $registro)
        <tr>
            <td>{{ $registro->id }}</td>
            <td>{{ $registro->nome_disciplina }}</td>
            <td>{{ $registro->curso_disciplina }}</td>
            <td>{{ $registro->carga_horaria }}</td>
            <td><a class="btn deep-orange" href="{{route('adm.formAttDisciplina', $registro->id)}}">Editar</a></td>
            <td><a class="btn red" href="{{route('adm.deletaDisciplina', $registro->id)}}">Deletar</a></td>
        </tr>
        @endforeach


    </table>
@endsection