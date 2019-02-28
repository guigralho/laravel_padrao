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
                    <h3>Redefinir senha</h3>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.request') }}">
                        <input type="hidden" name="token" value="{{ $token }}">
                        @csrf
                        <div class="line-form ">
                            <p>E-mail</p>
                            <input type="email" class="ipt-form {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Insira seu e-mail" name="email" value="{{ old('email') }}" required autofocus>

                            <label class="error">
                                @if ($errors->has('email'))
                                    {{ $errors->first('email') }}
                                @endif
                            </label>
                        </div><!-- line-form -->

                        <div class="line-form clearfix">
                            <p>Senha</p>
                            <input type="password" class="ipt-form{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Insira sua senha" name="password" required>
                            
                            <label class="error">
                                @if ($errors->has('password'))
                                    {{ $errors->first('password') }}
                                @endif
                            </label>
                        </div><!-- line-form -->

                        <div class="line-form clearfix">
                            <p>Confirmar Senha</p>
                            <input type="password" class="ipt-form{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Confirme sua senha" name="password_confirmation" required>
                            
                            <label class="error">
                                @if ($errors->has('password_confirmation'))
                                    {{ $errors->first('password_confirmation') }}
                                @endif
                            </label>
                        </div><!-- line-form -->

                        <div class="line-form">
                            <input type="submit" value="Alterar senha" class="btn-submit">
                        </div><!-- line-form -->
                    </form>
                </div><!-- formulario -->
            </div><!-- conteudo-area -->
        </div><!-- .area-right -->
    </div><!-- wrap-lg -->
@endsection