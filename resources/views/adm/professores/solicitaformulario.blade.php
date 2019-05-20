@extends('layout.site')

@section('titulo', 'Formulario professores')

@section('conteudo')
<link href="{{asset('css/usuario.css')}}" rel="stylesheet" />
</head>
<body class="fundo">
    <div>
        <div class="panel panel-dark panel-flat">
            <div class="panel-body">
                <p class="text-center pv">Cadastro de Professores</p>
                <form method="POST" action="{{ $caminho }}">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback">
                            <p class="title"> Sala:</p>
                            <select name="espaco">
                            <tr scope="row">
                            <!-- buscar no banco as salas criadas e trazer para monstar -->
                                @foreach($registros as $registroSala)
                                    <option value="{{ $registro->id }}" >{{ $registro->Sala }}</option><!-- verificar forma correta de por id dentro do value -->
                                @endforeach
                            </select>
                        </div>
                    </tr>
                    <div class="form-group has-feedback">
                        <p class="title"> Descrição:</p>
                        <input id="nome" name="description" autofocus type="text" placeholder="Motivo para a escolha da sala" required>
                    </div>
                   <br>
                    <button type="submit" class="btn btn-block btn-primary mt-lg btn-lg">Solicitar</button>
                </form>
            </div>
        </div>
    </div>
@endsection