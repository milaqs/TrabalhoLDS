@extends('layout.site')

@section('titulo', 'Formulario disciplinas')

@section('conteudo')
    <h3> Disciplinas </h3>
    <form method="POST" action="{{ $caminho }}">
    {{ csrf_field() }}
    <input name="nome_disciplina" type="text" placeholder="Nome da disciplina" value="{{ isset($disciplinas->nome_disciplina)  ? $disciplinas->nome_disciplina  : '' }}" /><br/>
    <input name="curso_disciplina" type="text" placeholder="Curso que pertence" value="{{ isset($disciplinas->curso_disciplina) ? $disciplinas->curso_disciplina : '' }}" /><br/>   <!-- MUDAR PARA SELECT OU ALGO PARECIDO -->
    <input name="carga_horaria" type="number" placeholder="Carga horária" value="{{ isset($disciplinas->carga_horaria) ? $disciplinas->carga_horaria : '' }}" /><br/><br/> <!-- TALVEZ UM SELECT COM HORÁRIOS DEFINIDOS... -->
    <button type="submit" value="salvar"> Salvar </button>
    </form>
@endsection