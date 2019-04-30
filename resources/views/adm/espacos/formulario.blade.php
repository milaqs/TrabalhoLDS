@extends('layout.site')

@section('titulo', 'Formulario espaços')

@section('conteudo')
    <h3> Espaços </h3>
    <form method="POST" action="{{ $caminho }}">
    {{ csrf_field() }}
    <input name="nome_espaco" type="text" placeholder="Nome do espaço" value="{{ isset($espacos->nome_espaco)  ? $espacos->nome_espaco  : '' }}" /><br/>
    <input name="capacidade_espaco" type="number" placeholder="Capacidade de Lotação" value="{{ isset($espacos->capacidade_espaco)  ? $espacos->capacidade_espaco  : '' }}" /><br/> <br/>
    <label for="descricao_espaco"> Descrição do espaço </label><br/><br/>
    <textarea name="descricao_espaco" rows="7" cols="50">{{ isset($espacos->descricao_espaco) ? $espacos->descricao_espaco :  ''}}
    </textarea><br/><br/>
    <button type="submit" value="salvar"> Salvar </button>
    </form>
@endsection