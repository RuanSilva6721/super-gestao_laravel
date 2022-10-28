@extends('site.layouts.base')

@section('title', $title)

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Login</h1>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="user" class="borda-preta" placeholder="Usuário">
            @if($errors->has('user'))
            {{$errors->first('user')}}
            @endif
            <input type="password" name="password" class="borda-preta" placeholder="Senha">
            @if($errors->has('password'))
            {{$errors->first('password')}}
            @endif
            <button type="submit" class="borda-preta">Acessar</button>

        </form>

        {{ isset($erro) && $erro != '' ? $erro : ''}}
        </div>
    </div>


</div>

        <div class="rodape">
            <div class="redes-sociais">
                <h2>Redes sociais</h2>
                <img src="{{ asset('img/facebook.png') }}">
                <img src="{{ asset('img/linkedin.png') }}">
                <img src="{{ asset('img/youtube.png') }}">
            </div>
            <div class="area-contato">
                <h2>Contato</h2>
                <span>(11) 3333-4444</span>
                <br>
                <span>supergestao@dominio.com.br</span>
            </div>
            <div class="localizacao">
                <h2>Localização</h2>
                <img src="{{ asset('img/mapa.png') }}">
            </div>
        </div>
@endsection
