@extends('layouts.email')

@section('content')
<tr>
    <td align="center" bgcolor="#ffffff" style="padding: 40px 40px; color: #555555; font-family: Arial, sans-serif; font-size: 15px; line-height: 25px; border-bottom: 1px solid #f6f6f6;">
        Olá {{ $user->name }},<br><br>
        Segue abaixo o seu acesso no nosso sistema: <br>
        Login: {{ $user->email }} <br>
        Senha: {{ $password }}
    </td>
</tr>
<tr>
    <td align="center" bgcolor="#f9f9f9" style="padding: 30px 20px 30px 20px; font-family: Arial, sans-serif;">
        <table bgcolor="#0e683f" border="0" cellspacing="0" cellpadding="0" class="buttonwrapper">
            <tr>
                <td align="center" height="50" style="padding:0 25px 0 25px;font-family:Arial,sans-serif;background:#0e683f;font-size:16px;font-weight:bold" class="button">
                    <a href="{{ route('login') }}" style="color: #ffffff; text-align: center; text-decoration: none;">Acesse sua Conta</a>
                </td>
            </tr>
        </table>
    </td>
</tr>
@endsection