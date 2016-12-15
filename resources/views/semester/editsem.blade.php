@extends('layout')

@section('title', '| Edit Semester')

@section('content')

<div class="container">
	<div class="panel panel-primary">
		<div class="panel-head">
			<h2 style="margin-left: 20px;">Semester: {{$semester->number}}</h2>
		</div>
		<div class="panel-body">
			<form action="{{route('updateSemester', $semester->id)}}" class="form-horizontal" method="PUT">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label for="select-year" class="control-label col-md-3 col-sm-3 col-xs-12">Batch:</label>
							<div class="col-md-3 col-sm-3 col-xs-9">
								<input type="text" class="form-control" value="{!! $semester->year !!}" name="year">
							</div>
						</div>
						<div class="form-group">
							<label for="sem-name" class="control-label col-md-3 col-sm-3 col-xs-12">Semester:</label>
							<div class="col-md-3 col-sm-3 col-xs-9">
								<input type="text" class="form-control" value="{!! $semester->number !!}" name="name">
							</div>
						</div>
						<div class="form-group">
							<label for="branch" class="control-label col-md-3 col-sm-3 col-xs-12">Specialization:</label>
							<div class="col-md-3 col-sm-3 col-xs-9">
								<input type="text" class="form-control" value="{!! $semester->branch !!}" name="branch">
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
				{{ csrf_field() }}
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
								<input type="submit" class="form-control btn btn-success" id="semSubmit" value="Save Semester">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
								<button class="form-control btn btn-danger" id="semDelete" action="{{route('deleteSemester', $semester->id)}}">Delete Semester</button>
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

@section('scripts')

{{-- <script type="text/javascript">
	$('#semDelete').click(function (e) {
		e.preventDefault();
		$.ajax({
            url: 'deleteSemester/',
            type: 'get',
            success: function () {
            	console.log(data);
            }
        });
	});
</script> --}}

@stop