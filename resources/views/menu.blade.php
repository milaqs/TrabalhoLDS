@extends('layout._includes.menu')

@section('itens')
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="{{route('home')}}">
      <img src="{{asset('img/logo.png')}}" width="30" height="30" alt="">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(Página atual)</span></a>
      </li>

      @if(!auth()->check())
        <li class="nav-item">
          <a class="nav-link" href="#">Eventos</a>
        </li>
      @endif
    
      @if(auth()->check())
        
        @if(Auth::user()->tipo != 'administrador')
        <li class="nav-item">
          <a class="nav-link" href="#">Eventos</a>
        </li>      
        @endif
        
        @if(Auth::user()->tipo == 'administrador')
          <li class="nav-item">
            <a class="nav-link" href="{{route('adm.listaDisciplina')}}">Disciplinas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('adm.listaProfessor')}}">Professores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('adm.listaServidor')}}">Servidores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('adm.listaCurso')}}">Cursos</a>
          </li>
        @endif

        @if(Auth::user()->tipo == 'administrador' || Auth::user()->tipo =='servidor')
          <li class="nav-item">
              <a class="nav-link" href="{{route('adm.listaEspaco')}}">Espaços</a>
          </li>
        @endif

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Solicitações
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(Auth::user()->tipo == 'administrador' || Auth::user()->tipo =='servidor')
              <a class="dropdown-item" href="{{route('adm.historicoSolicitacoes')}}">Histórico de solicitações</a>
              <a class="dropdown-item" href="{{route('adm.listarSolicitacoes')}}">Solicitações pendentes</a>
            @endif

            @if(Auth::user()->tipo == 'professor')
            <a class="dropdown-item" href="{{route('adm.solicitaEspaco')}}">Fazer solicitação de espaço</a>
            <a class="dropdown-item" href="{{route('adm.listarMinhasSolicitacoes')}}">Minhas solicitações</a>
            @endif
          </div>
        </li>
      @endif

    </ul>

    @if(!auth()->check())
      <ul class="navbar-nav  my-2 my-lg-0">
          <li class="nav-item"> <a class="nav-link" href="{{route('login')}}"> Login </a> </li>
      </ul>
    @endif

    @if(auth()->check())
      <ul class="navbar-nav  my-2 my-lg-0">
        <li class="nav-item"> <a class="nav-link" href="{{route('logout')}}"> Logout </a> </li>
      </ul>
    @endif


  </div>
@endsection