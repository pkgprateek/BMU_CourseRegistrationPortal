@extends('layout')

@section('title', 'Form Confirm')

@section('content')

<div class="container">
	<div class="panel panel-primary">
		<div class="panel-head">
			<h2 style="margin-left: 20px;">Form Confirmation</h2>
			<h4 style="margin-left: 20px;">{{$form->name}}</h4>
		</div>
		<div class="panel-body">
			<form action="{{route('confirmForm', $form->registration_id)}}" class="form-horizontal" method="PUT">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label for="select-year" class="control-label col-md-3 col-sm-3 col-xs-12">Registration Id:</label>
							<div class="col-md-3 col-sm-3 col-xs-9">
								<input type="text" class="form-control" value="{!! $form->registration_id !!}" name="registration_id">
							</div>
						</div>
						<div class="form-group">
							<label for="sem-name" class="control-label col-md-3 col-sm-3 col-xs-12">Name:</label>
							<div class="col-md-3 col-sm-3 col-xs-9">
								<input type="text" class="form-control" value="{!! $form->name !!}" name="name">
							</div>
						</div>
						<div class="form-group">
							<label for="branch" class="control-label col-md-3 col-sm-3 col-xs-12">Batch:</label>
							<div class="col-md-3 col-sm-3 col-xs-9">
								<input type="text" class="form-control" value="{!! $form->batch !!}" name="batch">
							</div>
						</div>
						<div class="form-group">
							<label for="branch" class="control-label col-md-3 col-sm-3 col-xs-12">Branch:</label>
							<div class="col-md-3 col-sm-3 col-xs-9">
								<input type="text" class="form-control" value="{!! $form->branch !!}" name="branch">
							</div>
						</div>
						<div class="form-group">
							<label for="branch" class="control-label col-md-3 col-sm-3 col-xs-12">Semester:</label>
							<div class="col-md-3 col-sm-3 col-xs-9">
								<input type="text" class="form-control" value="{!! $form->semester !!}" name="semester">
							</div>
						</div>

						<div class="form-group subjects">
							@foreach ($subjects as $subject)
								@if($subject->type == 'Core')
								<label for="core" class="control-label col-md-3 col-sm-3 col-xs-12">{{$subject->type}}:</label>
								<div class="col-md-7 col-sm-6 col-xs-12">  
									<input type="textbox" class="form-control sub-no" value="{{$subject->code}}" name="coreCode[]">  
									<input type="textbox" class="form-control sub-name" value="{{$subject->name}}" name="coreName[]">
									<input type="textbox" class="form-control sub-tc" value="{{$subject->tc}}" name="coretc[]" placeholder="TC">
									<input type="textbox" class="form-control sub-pc" value="{{$subject->pc}}" name="corepc[]" placeholder="PC">
								</div>
								@endif
								@if($subject->type == 'Elective')
								<label for="core" class="control-label col-md-3 col-sm-3 col-xs-12">{{$subject->type}}:</label>
								<div class="col-md-7 col-sm-6 col-xs-12">  
									<input type="textbox" class="form-control sub-no" value="{{$subject->code}}" name="electiveCode[]">  
									<input type="textbox" class="form-control sub-name" value="{{$subject->name}}" name="electiveName[]">
									<input type="textbox" class="form-control sub-tc" value="{{$subject->tc}}" name="electivetc[]" placeholder="TC">
									<input type="textbox" class="form-control sub-pc" value="{{$subject->pc}}" name="electivepc[]" placeholder="PC">
								</div>
								@endif
							@endforeach
						</div>
						<div class="form-group">
							<label for="branch" class="control-label col-md-3 col-sm-3 col-xs-12">CGPA:</label>
							<div class="col-md-3 col-sm-3 col-xs-9">
								<input type="text" class="form-control" value="" name="cgpa">
							</div>
						</div>
						<div class="form-group">
							<label for="branch" class="control-label col-md-3 col-sm-3 col-xs-12">Attendance:</label>
							<div class="col-md-3 col-sm-3 col-xs-9">
								<input type="text" class="form-control" value="" name="attendance">
							</div>
						</div>
						<div class="form-group">
							<label for="branch" class="control-label col-md-3 col-sm-3 col-xs-12">Fees:</label>
							<div class="col-md-3 col-sm-3 col-xs-9">
								<input type="radio" value="Paid" name="fees" id="paid">
								<label for="paid">Paid</label>
								<br>
								<input type="radio" value="Unpaid" name="fees" id="unpaid">
								<label for="unpaid">Unpaid</label>
							</div>
						</div>
						<div class="form-group">
							<label for="branch" class="control-label col-md-3 col-sm-3 col-xs-12">Provision Applies:</label>
							<div class="col-md-3 col-sm-3 col-xs-9">
								<input type="radio" value="provision-given" name="providion" id="provision">
								<label for="provision">Provision</label>
							</div>
						</div>
				{{ csrf_field() }}
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
								<input type="submit" class="form-control btn btn-success" id="semSubmit" value="Confirm Registration">
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


@stop

@section('styles')

	<style type="text/css" media="screen">
		.select-2-container {
        	width: auto;
        }
        .select2-container .select2-selection--single {	
		    height: 32px; 
		}
		#select2-select-year-container {
		    margin-top: -4px;
		}
		.subjects input {
			display: inline-block;
			margin-right: 2px;
		}

		.subjects label, .subjects input {
			margin-bottom: 5px;
		}
		.sub-no {
			width: 15%;
		}
		.sub-name {
			width: 45%;
		}
		.sub-pc, .sub-tc {
			width: 13%;
		}
		.add-btns input {
			width: 49.5%;
		}
	</style>
@stop