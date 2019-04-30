@extends('layout.site')

@section('titulo', 'Formulario professores')

@section('conteudo')
    <h3> Professores </h3>
    <form method="POST" action="{{ $caminho }}">
    {{ csrf_field() }}
    <input name="prontuario_professor" type="text" placeholder="Prontuário do professor" value="{{ isset($professores->prontuario_professor)  ? $professores->prontuario_professor  : '' }}" /><br/>
    <input name="nome_professor" type="text" placeholder="Nome do professor" value="{{ isset($professores->nome_professor)  ? $professores->nome_professor  : '' }}" /><br/> 
    <input name="email_professor" type="email" placeholder="Email do professor" value="{{ isset($professores->email_professor)  ? $professores->email_professor  : '' }}" /><br/> <br/>
    <button type="submit" value="salvar"> Salvar </button>
    </form>
@endsection