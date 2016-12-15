@extends('layout')

@section('title', '| Profile')

@section('content')

<div class="container">

	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<div class="col-md-4 col-md-offset-2">
								<img src="/img/avatar04.png" class="img-circle" alt="User Image">
							</div>
						</div>

						<div class="form-group" >
							<strong style="margin-right: 5px;">Name: </strong>
							{{$student->name}}
						</div>
						<div class="form-group">
							<strong style="margin-right: 5px;">Registration Id: </strong>
							{{$student->registration_id}}
						</div>
						<div class="form-group">
							<strong style="margin-right: 5px;">Batch: </strong>
							{{$student->batch_year}}
							<strong style="margin-right: 5px; margin-left: 30px;">Branch: </strong>
							{{$student->specialization}}
						</div>
						<div class="form-group">
							<strong style="margin-right: 5px;">Email: </strong>
							{{$student->email}}
						</div>
						<div class="form-group">
							<strong style="margin-right: 5px;">Contact: </strong>
							{{$student->contact}}
						</div>
						@if($student->faculty_id != null)
						<div class="form-group">
							<strong style="margin-right: 5px;">Assigned Faculty: </strong>
							{{$faculty->name}}
						</div>
						@endif
					</div>
			</div>
		</div>
	</div>
</div>

@stop