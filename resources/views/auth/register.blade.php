@extends('layouts.login')

@section('content')
    <div class="wrap-lg">
        <div class="area area-left">
            <div class="conteudo-area">
                <div class="line-logo">
                    <div class="logo">
                        <a href="./">
                            <img src="{{ asset('site/images/logo-cad-login-beback.svg') }}" alt="">
                        </a>
                    </div><!-- logo -->
                </div><!-- line-logo -->

                <div class="box-texto">
                    <h2>Faça cada hospedagem se tornar um momento único!</h2>
                    <p>Desconto garantido sobre a melhor tarifa disponível, parceiros com descontos imperdíveis, serviços exclusivos por status do programa e muito mais.</p>
                </div><!-- box-texto -->
            </div><!-- .conteudo-area -->
        </div><!-- area-left -->

        <div class="area area-right">
            <div class="conteudo-area">
                <div class="formulario">
                    <h3 class="no-mg">Cadastre-se</h3>
                    <h4>Efetue seu cadastro no programa, preenchendo os dados abaixo:</h4>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="line-form">
                            <p>Nome</p>
                            <input type="text" class="ipt-form {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Insira seu nome" name="name" value="{{ old('name') }}" required autofocus>

                            <label class="error">
                                @if ($errors->has('name'))
                                    {{ $errors->first('name') }}
                                @endif
                            </label>
                        </div><!-- line-form -->

                        <div class="line-form">
                            <p>E-mail</p>
                            <input type="email" class="ipt-form {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Insira seu e-mail" name="email" value="{{ old('email') }}" required>

                            <label class="error">
                                @if ($errors->has('email'))
                                    {{ $errors->first('email') }}
                                @endif
                            </label>
                        </div><!-- line-form -->

                        <div class="line-form">
                            <p>Senha</p>
                            <input type="password" class="ipt-form{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Insira sua senha" name="password" required>

                            <label class="error">
                                @if ($errors->has('password'))
                                    {{ $errors->first('password') }}
                                @endif
                            </label>
                        </div><!-- line-form -->

                        <div class="line-form">
                            <p>Confirmar Senha</p>
                            <input id="password-confirm" type="password" class="ipt-form" placeholder="Confirme sua senha" name="password_confirmation" required>

                            <label class="error"></label>
                        </div><!-- line-form -->

                        <div class="line-form clearfix">
                            <label>
                                <div class="fake-check">
                                    <input type="checkbox">
                                </div><!-- fake-check -->
                                Eu aceito os <a href="">Termos e Condições</a>.
                            </label>

                            <label>
                                <div class="fake-check">
                                    <input type="checkbox">
                                </div><!-- fake-check -->
                                Eu aceito receber ofertas e promoções.
                            </label>
                        </div><!-- line-form -->

                        <div class="line-form">
                            <input type="submit" value="Entrar" class="btn-submit">
                        </div><!-- line-form -->

                        <hr>

                        <div class="line-form">
                            <p class="txt-bottom">
                                Já possui cadastro? <a href="{{ route('login') }}">Acesse sua conta</a>
                            </p>
                        </div><!-- line-form -->
                    </form>
                </div><!-- formulario -->
            </div><!-- conteudo-area -->
        </div><!-- .area-right -->
    </div><!-- wrap-lg -->



@endsection
