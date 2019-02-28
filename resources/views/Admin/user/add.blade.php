@extends('Admin.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('add_user', $user ? $user : null ) }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="tab-content panel m-t-20">
            <div class="tab-pane slide-left active">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-group-default required {{ $errors->has('name') ? 'error' : '' }}">
                                <label>Nome</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ data_get($user, 'name', old('name')) }}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group form-group-default required {{ $errors->has('email') ? 'error' : '' }}">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ data_get($user, 'email', old('email')) }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group form-group-default form-group-default-select2 required">
                                <label>Grupo</label>
                                <select name="user_group_id" class="full-width form-control" data-init-plugin="select2">
                                    @foreach($userGroups as $userGroup)
                                        <option value="{{ $userGroup->id }}" @if (data_get($user, 'user_group_id', old('user_group_id')) == $userGroup->name) selected @endif>{{ $userGroup->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group form-group-default form-group-default-select2 required">
                                <label>Status</label>
                                <select name="status" class="full-width form-control" data-init-plugin="select2">
                                    @foreach(\BeBack\Constants\UserStatusConstant::getConstants() as $key => $userStatus)
                                        <option value="{{ $userStatus }}" @if (data_get($user, 'status', old('status')) == $userStatus) selected @endif>{{ $userStatus }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <button class="btn btn-block btn-success js-salvar" type="submit" data-loading-text="Aguarde...">Salvar</button>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.user') }}" class="btn btn-block btn-default "><span>Voltar</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection