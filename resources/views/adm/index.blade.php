@extends('layout.site')

@section('titulo', 'Index Servidores')

@section('conteudo')
    <link href="{{asset('css/admin.css')}}" rel="stylesheet" />
    </head>
    <body class="index">
        <div class="content">
            <div class="card-deck">
                <div class="card mb-4">
                    <div class="view overlay">
                        <img class="card-img-top" src="https://cdn3.iconfinder.com/data/icons/rest/30/add_order-512.png" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Listagem de Disciplinas</h4> 
                        <p class="card-text">Criar salar</p>
                        <form method="get" action="{{route('adm.listaDisciplina')}}">
                            <button type="submit" class="btn btn-light-blue btn-md">Acessar</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="view overlay">
                        <img class="card-img-top" src="https://www.freeiconspng.com/uploads/edit-png-icon-blue-pencil-18.png" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Listagem de Espaços</h4>
                        <p class="card-text">Edite os espaços criados</p>
                        <form method="get" action="{{route('adm.listaEspaco')}}">
                            <button type="submit" class="btn btn-light-blue btn-md">Acessar</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="view overlay">
                        <img class="card-img-top" src="https://image.flaticon.com/icons/png/512/760/760847.png" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Listagem de Professores</h4> 
                        <p class="card-text">Criar novo usuário</p>
                        <form method="get" action="{{route('adm.listaProfessor')}}">
                            <button type="submit" class="btn btn-light-blue btn-md">Acessar</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="view overlay">
                        <img class="card-img-top" src="https://images.vexels.com/media/users/3/135249/isolated/preview/1b3e2006c49d0a6847f81576d74f5088-users-flat-icon-silhouettes-by-vexels.png" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Listagem de Servidores</h4>
                        <p class="card-text">Edite os usuários criados</p>
                        <form method="get" action="{{route('adm.listaServidor')}}">
                            <button type="submit" class="btn btn-light-blue btn-md">Acessar</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="view overlay">
                        <img class="card-img-top" src="" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Listagem de salas solicitadas</h4>
                        <p class="card-text">Verifique histórico das salas usadas</p>
                        <!-- <form method="get" action=""> -->
                            <button type="submit" class="btn btn-light-blue btn-md">Acessar</button>
                        <!-- </form> -->
                    </div>
                </div>

                 <div class="card mb-4">
                    <div class="view overlay">
                        <img class="card-img-top" src="" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Aprovar pedidos de salas</h4>
                        <!-- <form method="get" action=""> -->
                            <button type="submit" class="btn btn-light-blue btn-md">Acessar</button>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
@endsection