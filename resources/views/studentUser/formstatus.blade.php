@extends('layout')

@section('title', '| Form Status')

@section('content')

<div class="container">
	<div class="panel panel-primary">
		<div class="panel-head">
			<h2 style="margin-left: 20px;"></h2>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							@if($form->verify_status == 1)
							<button class="form-control btn btn-success" id="regConfirm" action="">Registration Confirmed</button>
							@endif
							@if($form->verify_status == 0)
							<button class="form-control btn btn-warning" id="regConfirm" action="#">Registration Not Confirmed</button>
							@endif

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop