@extends('Admin.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('add_user_group', $userGroup ? $userGroup : null ) }}
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
                                <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ data_get($userGroup, 'name', old('name')) }}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group form-group-default required {{ $errors->has('description') ? 'error' : '' }}">
                                <label>Descrição</label>
                                <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{ data_get($userGroup, 'description', old('description')) }}">

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group form-group-default form-group-default-select2 required">
                                <label>Status</label>
                                <select name="status" class="full-width form-control" data-init-plugin="select2">
                                    @foreach(\BeBack\Constants\UserGroupStatusConstant::getConstants() as $key => $userGroupStatus)
                                        <option value="{{ $userGroupStatus }}" @if (data_get($userGroup, 'status', old('status')) == $userGroupStatus) selected @endif>{{ $userGroupStatus }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    @if(isset($userGroup->id))
                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-sm-12">
                                <h3>Permissões</h3>
                                <div class="table-responsive">
                                    <table class="table perm_table all-default">
                                        <thead>
                                        <tr>
                                            <th>Área</th>
                                            <th>Leitura</th>
                                            <th>Escrita</th>
                                            <th>Exclusão</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($menus as $menu)
                                                <tr>
                                                    <td>{{ $menu->name }}</td>
                                                    <?php
                                                        $permissionTypeConstant->flip()->each(function($permission) use ($menu, $role) {
                                                            $namePermission = str_slug("{$menu->name}_{$permission}", '-');
                                                            echo '<td>
                                                                    <div class="container-switcher">
                                                                        <input type="checkbox" data-init-plugin="switchery" data-size="small" '.($role->hasPermissionTo($namePermission) ? "checked" : "").' name="permissoes[]" value="'.$namePermission.'" />
                                                                    </div>
                                                                </td>';
                                                        });
                                                    ?>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-2">
                            <button class="btn btn-block btn-success js-salvar" type="submit" data-loading-text="Aguarde...">Salvar</button>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.user_group') }}" class="btn btn-block btn-default "><span>Voltar</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection