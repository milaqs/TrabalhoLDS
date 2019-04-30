@extends('layout.site')

@section('titulo', 'Formulario servidores')

@section('conteudo')
    <h3> Servidores </h3>
    <form method="POST" action="{{ $caminho }}">
    {{ csrf_field() }}
    <input name="prontuario_servidor" type="text" placeholder="Prontuário do servidor" value="{{ isset($servidores->prontuario_servidor)  ? $servidores->prontuario_servidor  : '' }}"/><br/>
    <input name="nome_servidor" type="text" placeholder="Nome do servidor" value="{{ isset($servidores->nome_servidor)  ? $servidores->nome_servidor  : '' }}"/><br/> 
    <input name="email_servidor" type="email" placeholder="Email do servidor" value="{{ isset($servidores->email_servidor)  ? $servidores->email_servidor  : '' }}" /><br/> <br/>
    <button type="submit" value="salvar"> Salvar </button>
    </form>
@endsection