@extends('Admin.layouts.app')

@section('breadcrumb')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel panel-transparent">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-default">
						<div class="card-header ">
							<div class="card-title">Dashboard
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection