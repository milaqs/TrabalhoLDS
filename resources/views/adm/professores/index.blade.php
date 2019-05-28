@extends('layout.site')

@section('titulo', 'Index Professores')

@section('conteudo')
    <link href="{{asset('css/admin.css')}}" rel="stylesheet" />
    </head>
    <body class="index">
        <div class="content">
            <div class="card-deck">
                <div class="card mb-4">
                    <div class="view overlay">
                    <img class="card-img-top" src="https://www.freeiconspng.com/uploads/edit-png-icon-blue-pencil-18.png" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Solicitação de Salas</h4> 
                        <p class="card-text">Solicitar salar</p>
                        <a href="solicitaFormulario"> 
                            <button class="btn btn-light-blue btn-md">Acessar</button>
                        </a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="view overlay">
                    <img class="card-img-top" src="https://cdn3.iconfinder.com/data/icons/rest/30/add_order-512.png" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Listagem de pedidos</h4>
                        <p class="card-text">Verifique as aprovações dos espaços</p>
                        <form method="get" action="{{ route('adm.listarAprovacoes') }}">
                            <button type="submit" class="btn btn-light-blue btn-md">Acessar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection