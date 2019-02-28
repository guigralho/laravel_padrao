@extends('Admin.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('change_password') }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="tab-content panel m-t-20">
        <div class="tab-pane slide-left active">
            <form action="" method="post" id="js-form-submit">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group form-group-default required {{ $errors->has('password') ? 'error' : '' }}">
                            <label>Nova senha</label>
                            <input type="password" name="password" id="inputPassword" placeholder="Nova senha" class="form-control">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group form-group-default required">
                            <label>Confirmar Senha</label>
                            <input type="password" class="form-control" id="inputConfPassword" placeholder="Confirmar Senha">
                            <span class="help-block" style="display:none">As senhas devem coincidir</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <button class="btn btn-block btn-success js-salvar" type="submit" data-loading-text="Aguarde...">Salvar</button>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('admin.home') }}" class="btn btn-block btn-default "><span>Voltar</span></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function(){
       
    $("#js-form-submit").on("submit", function(){
      $("#inputConfPassword").parent().find(".help-block").hide();

      if($("#inputPassword").val() != $("#inputConfPassword").val()){
        $("#inputConfPassword").parent().parent().addClass("has-error");

        $("#inputConfPassword").parent().find(".help-block").show();
        event.preventDefault();
      } else {
        var $el = $(".js-salvar");

        $el.button('loading');

        setTimeout(function(){$el.button('reset')},6000);
      }

    })
  })
</script>
@endpush