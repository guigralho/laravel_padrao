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
                    <h3>Acesse sua conta</h3>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="line-form">
                            <p>E-mail</p>
                            <input type="email" class="ipt-form {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Insira seu e-mail" name="email" value="{{ old('email') }}" required autofocus>

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

                        <div class="line-form clearfix">
                            <div class="cols">
                                <label>
                                    <div class="fake-check">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    </div><!-- fake-check -->
                                    Lembrar meus dados
                                </label>
                            </div><!-- cols -->
                            
                            <div class="cols text-right">
                                <a href="{{ route('password.request') }}">Esqueci a senha</a>
                            </div><!-- cols -->
                        </div><!-- line-form -->

                        <div class="line-form">
                            <input type="submit" value="Entrar" class="btn-submit">
                        </div><!-- line-form -->

                        <hr>

                        <div class="line-form">
                            <p class="txt-bottom">
                                Ainda não possui uma conta? <a href="{{ route('register') }}">Cadastre-se</a>
                            </p>
                        </div><!-- line-form -->
                    </form>
                </div><!-- formulario -->
            </div><!-- conteudo-area -->
        </div><!-- .area-right -->
    </div><!-- wrap-lg -->

@endsection