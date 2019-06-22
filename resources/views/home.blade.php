@extends('layout.site')

@section('titulo', 'Home')

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
                    <div class="row">
                        <div class="col-md-4 option">
                            <span>Curso:</span>
                            <select class="custom-select">
                                <option selected></option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-md-4 option">
                                <span>Módulo:</span>
                            <select class="custom-select">
                                <option selected></option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-md-4 option">
                                <span>Período:</span>
                            <select class="custom-select">
                                <option selected></option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
                <table class="table-calendar">
                    <thead>
                        <tr>
                            <th scope='col'>Horários</th>
                            <th scope='col'>Domingo</th>
                            <th scope='col'>Segunda</th>
                            <th scope='col'>Terça</th>
                            <th scope='col'>Quarta</th>
                            <th scope='col'>Quinta</th>
                            <th scope='col'>Sexta</th>
                            <th scope='col'>Sabado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>14:30h às 15h</td>
                            <td>Giovani LDS<br>G 45</td>
                            <td>Marcia LPO<br>G 45</td>
                            <td>Marcia LPO<br>G 45</td>
                            <td>Giovani LDS<br>G 45</td>
                            <td>Giovani LDS<br>G 45</td>
                            <td>Giovani LDS<br>G 45</td>
                            <td>Giovani LDS<br>G 45</td>
                        </tr>
                        <tr>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection