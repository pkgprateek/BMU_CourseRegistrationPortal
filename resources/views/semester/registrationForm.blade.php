@extends('layout')

@section('title', '| Registration Form')

@section('content')

<div class="container">
	<div class="panel panel-primary">
		<div class="panel-body">
			<form action="{{route('semesterRegistration')}}" class="form-horizontal" method="post">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label for="select-year" class="control-label col-md-3 col-sm-3 col-xs-12">Registration Id:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" class="form-control" name="registration_id" value="{{$student->registration_id}}">
							</div>
						</div>
						<div class="form-group">
							<label for="sem-name" class="control-label col-md-3 col-sm-3 col-xs-12">Name:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" class="form-control" name="name" value="{{$student->name}}">
							</div>
						</div>
						<div class="form-group">
							<label for="branch" class="control-label col-md-3 col-sm-3 col-xs-12">Batch Year:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" id="select-year" name="semYear">
									<option value=""></option>
									<option value="<?php echo date('Y') - 3; ?>"><?php echo date("Y") - 3; ?></option>
	                                <option value="<?php echo date('Y') - 2; ?>"><?php echo date("Y") - 2; ?></option>
	                                <option value="<?php echo date('Y') - 1; ?>"><?php echo date("Y") - 1; ?></option>
	                                <option value="<?php echo date('Y'); ?>"><?php echo date("Y"); ?></option>
				                </select>
							</div>
						</div>
						<div class="form-group">
							<label for="branch" class="control-label col-md-3 col-sm-3 col-xs-12">Specialization:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select id="branch" class="form-control" name="semBranch">
                                    <option value="">Branch</option>
                                    <option value="CE">CE</option>
                                    <option value="CSC">CSC</option>
                                    <option value="CSE">CSE</option>
                                    <option value="ECE">ECE</option>
                                    <option value="ME">ME</option>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label for="branch" class="control-label col-md-3 col-sm-3 col-xs-12">Semester:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" id="sem-name" name="semName">
									<option value=""></option>
									<option value="{{$semester->number}}">{{$semester->number}}</option>
				                </select>
							</div>
						</div>
						<div class="form-group subjects">
							@foreach ($subjects as $subject)
								@if($subject->type == 'Core')
								<label for="core" class="control-label col-md-3 col-sm-3 col-xs-12">{{$subject->type}}:</label>
								<div class="col-md-7 col-sm-6 col-xs-12">  
									<input type="textbox" class="form-control sub-no" value="{{$subject->code}}" name="coreCode[]" disabled>  
									<input type="textbox" class="form-control sub-name" value="{{$subject->name}}" name="coreName[]" disabled>
									<input type="textbox" class="form-control sub-tc" value="{{$subject->tc}}" name="coretc[]" placeholder="TC" disabled>
									<input type="textbox" class="form-control sub-pc" value="{{$subject->pc}}" name="corepc[]" placeholder="PC" disabled>
								</div>
								@endif
								@if($subject->type == 'Elective')
								<label for="core" class="control-label col-md-3 col-sm-3 col-xs-12">{{$subject->type}}:</label>
								<div class="col-md-7 col-sm-6 col-xs-12">  
									<input type="textbox" class="form-control sub-no" value="{{$subject->code}}" name="electiveCode[]" disabled>  
									<input type="textbox" class="form-control sub-name" value="{{$subject->name}}" name="electiveName[]" disabled>
									<input type="textbox" class="form-control sub-tc" value="{{$subject->tc}}" name="electivetc[]" placeholder="TC" disabled>
									<input type="textbox" class="form-control sub-pc" value="{{$subject->pc}}" name="electivepc[]" placeholder="PC" disabled>
								</div>
								@endif
							@endforeach
						</div>
					</div>
				</div>
				{{ csrf_field() }}
				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
						<button type="submit" class="form-control btn btn-success" id="semSubmit">Register</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@stop

@section('scripts')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<script type="text/javascript">
		$.ajaxSetup({
	        headers: {
        	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	}
		});
		$('#select-year').select2({
			placeholder: "Select Here..",
			minimumResultsForSearch: Infinity
		});
		$('#branch').select2({
			placeholder: "Select Here..",
			minimumResultsForSearch: Infinity
		});
		$('#sem-name').select2({
			placeholder: "Select Here..",
			minimumResultsForSearch: Infinity
		});
	</script>
@stop

@section('styles')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

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