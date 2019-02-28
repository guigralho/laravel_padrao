@extends('Admin.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('user') }}
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
                            @foreach(\BeBack\Constants\UserStatusConstant::getConstants() as $key => $userStatus)
                                <option value="{{ $userStatus }}" @if (request()->get('status') == $userStatus) selected @endif>{{ $userStatus }}</option>
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
                                    <th>Grupo</th>
                                    <th>Email</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($listUsers as $user )
                                    <tr>
                                        <td>
                                            <span class="{{ $user->label() }}">{{ $user->status }}</span>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->group->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-info btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:" onclick="verConfirm('{{ route('admin.user.delete', $user->id) }}');" rel="tooltip" title="Excluir" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Nenhum registro encontrado</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="pull-left">
                        {{ $listUsers->total() }} registro(s)
                    </div>
                    <div class="pull-right">
                        {{ $listUsers->links() }}
                    </div>

                    <div class="col-xs-1 col-xs-offset-11">
                        <div class="form-group">
                            <a href="{{ route('admin.user.add') }}" class="btn btn-complete btn-novo" style="color: #fff;border-radius: 100%;padding: 10px 15px;position: fixed;bottom: 10px;right: 10px;z-index: 999;">
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