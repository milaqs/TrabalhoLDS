@extends('layout.site')

@section('titulo', 'Index Servidores')

@section('conteudo')
<style>
    body {
        background-color: #a3a3a3 !important;
    }
</style>
    <link href="{{asset('css/usuario.css')}}" rel="stylesheet" />
    <div>
        <div class="panel-calendar">
            <div class="calendar-content">
                <div class="calendar-options">
                    <form method="post" action="{{ route('filtrar') }}" class="form-inline">
                        @csrf
                    <div class="row">
                            <div class="col-md-3 option">
                                <span>Curso:</span>
                                <select class="custom-select" name="id_curso">
                                    <option disable></option>
                                        @foreach($cursos as $curso)
                                        <tr scope="row">
                                            <option value="{{$curso->id}}" >{{$curso->nome_curso}}</option>
                                        @endforeach
                                        </tr>
                                </select>
                            </div>
                            <div class="col-md-5 option">
                                    <span>Disciplina:</span>
                                <select class="custom-select" name="id_disciplina">
                                        <option disable></option>
                                        @foreach($disciplinas as $disciplina)
                                        <tr scope="row">
                                            <option value="{{$disciplina->id}}" >{{$disciplina->nome_disciplina}}</option>
                                        @endforeach
                                        </tr>
                                </select>
                            </div>
                            <div class="col-md-3 option">
                                    <span>Sala:</span>
                                <select class="custom-select" name="id_espaco">
                                        <option disable></option>
                                        @foreach($espacos as $espaco)
                                        <tr scope="row">
                                            <option value="{{$espaco->id}}" >{{$espaco->nome_espaco}}</option>
                                        @endforeach
                                        </tr>
                                </select>
                            </div>
                            <div class="col-md-1 option">
                                    <input type="submit" value="Filtrar"/>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table-calendar">
                    <thead>
                        <tr>
                            <th scope='col'>Horários</th>
                            <th scope='col'>Segunda</th>
                            <th scope='col'>Terça</th>
                            <th scope='col'>Quarta</th>
                            <th scope='col'>Quinta</th>
                            <th scope='col'>Sexta</th>
                            <th scope='col'>Sabado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($horarios))
                            @foreach($horarios as $one)
                            <tr>
                                <td>{{ isset($one['hora']) ?  $one['hora'] : '-' }}</td>
                                <td>
                                    {{ isset($one['segunda']) ?  $one['segunda'] : '-' }}
                                </td>
                                <td>
                                    {{ isset($one['terca']) ?  $one['terca'] : '-' }}
                                </td>
                                <td>
                                    {{ isset($one['quarta']) ?  $one['quarta'] : '-' }}
                                </td>
                                <td>
                                    {{ isset($one['quinta']) ?  $one['quinta'] : '-' }}
                                </td>
                                <td>
                                    {{ isset($one['sexta']) ?  $one['sexta'] : '-' }}
                                </td>
                                <td>
                                    {{ isset($one['sabado']) ?  $one['sabado'] : '-' }}
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection