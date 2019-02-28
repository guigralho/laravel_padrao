@extends('Admin.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('user_group') }}
@endsection

@section('content')
<div class="container-fluid">
    <!-- START PANEL -->
    <div class="panel panel-transparent">
        <div class="panel-body">
            <form action="">
                <div class="row">
                    <div class="col-md-2 m-t-20">
                        <select name="status" class="full-width" id="status" data-init-plugin="select2">
                            <option value="">Status</option>
                            @foreach(\BeBack\Constants\UserGroupStatusConstant::getConstants() as $key => $userGroupStatus)
                                <option value="{{ $userGroupStatus }}" @if (request()->get('status') == $userGroupStatus) selected @endif>{{ $userGroupStatus }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 m-t-20">
                        <input type="text" name="search" class="form-control" placeholder="Pesquisar" value="{{ request()->get('search') }}">
                    </div>
                    
                    <div class="col-md-1 m-t-20">
                        <button id="limparCampos" class="btn btn-default">Buscar</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12 m-t-15">
                    <div class="table-responsive">
                        <table class="table table-striped" id="lista">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($listUserGroups as $userGroup )
                                    <tr>
                                        <td>
                                            <span class="{{ $userGroup->label() }}">{{ $userGroup->status }}</span>
                                        </td>
                                        <td>{{ $userGroup->name }}</td>
                                        <td>{{ $userGroup->description }}</td>
                                        <td>
                                            <a href="{{ route('admin.user_group.edit', $userGroup->id) }}" class="btn btn-info btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:" onclick="verConfirm('{{ route('admin.user_group.delete', $userGroup->id) }}');" rel="tooltip" title="Excluir" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Nenhum registro encontrado</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="pull-left">
                        {{ $listUserGroups->total() }} registro(s)
                    </div>
                    <div class="pull-right">
                        {{ $listUserGroups->links() }}
                    </div>

                    <div class="col-xs-1 col-xs-offset-11">
                        <div class="form-group">
                            <a href="{{ route('admin.user_group.add') }}" class="btn btn-complete btn-novo" style="color: #fff;border-radius: 100%;padding: 10px 15px;position: fixed;bottom: 10px;right: 10px;z-index: 999;">
                            <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection