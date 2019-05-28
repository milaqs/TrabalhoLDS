@extends('layout.site')

@section('titulo', 'Login')

@section('conteudo')
<link href="{{asset('css/usuario.css')}}" rel="stylesheet" />
    </head>
    <body class="fundo">
        <div>
            <div class="panel panel-dark panel-flat">
                <div class="panel-body">
                    <p class="text-center pv">Login</p>
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        @if(isset($message))
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @endif
                        <div class="form-group has-feedback">
                            <p class="title"> Prontuário:</p>
                            <input id="prontuario" name="prontuario" type="text" placeholder="GU0000000" required
                                value="{{ isset($servidores->prontuario)  ? $servidores->prontuario  : '' }}"
                                class="form-control {{ $errors->has('prontuario') ? 'is-invalid' : '' }}">
                                @if($errors->has('prontuario'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('prontuario') }}
                                    </div>
                                @endif
                            <div class="form-group has-feedback">
                            <p class="title">Senha:</p>
                            <input id="password" name="password" type="password" placeholder="Senha" required
                                value="{{ isset($servidores->password)  ? $servidores->password  : '' }}"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Lembrar usuario
                                    </label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary mt-lg btn-lg">Confirmar</button>
                    </form>
                    <p><a href="{{ route('password.request') }}">Primeiro acesso ou esqueceu a senha? clique aqui!</a> </p>
                </div>
            </div>
        </div>
@endsection