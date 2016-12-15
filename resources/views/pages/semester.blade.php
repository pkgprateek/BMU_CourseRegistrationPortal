@extends('layout')

@section('title', '| Create Semester')

@section('content')

<div class="container">
	<div class="panel panel-primary">
		<div class="panel-body">
			<form action="{{route('createSemester')}}" class="form-horizontal" method="post">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label for="select-year" class="control-label col-md-3 col-sm-3 col-xs-12">Batch:</label>
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
							<label for="sem-name" class="control-label col-md-3 col-sm-3 col-xs-12">Semester:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" id="sem-name" name="semName">
									<option value=""></option>
									@for ($i = 1; $i < 8; $i++)
										<option value="{{$i}}">{{$i}}</option>
									@endfor
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
						<div class="form-group subjects">
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-3 add-btns">
								<input type='button' value='Add Core' id='addCore' class="btn btn-primary">
								<input type='button' value='Add Elective' id='addElective' class="btn btn-primary">
							</div>
						</div>
					</div>
				</div>
				{{ csrf_field() }}
				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
						<button type="submit" class="form-control btn btn-success" id="semSubmit">Submit</button>
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

		$(document).ready(function () {
			var coreCounter = 1;
			$("#addCore").click(function () {
				var newCoreBox = $(document.createElement('div')).attr("id", 'core' + coreCounter);
				newCoreBox.after().html(
					'<label for="core' + coreCounter + '" class="control-label col-md-3 col-sm-3 col-xs-12">Core:</label>' + 
					'<div class="col-md-7 col-sm-6 col-xs-12">' + 
						'<input type="textbox" class="form-control sub-no" id="core' + coreCounter + 'Code" placeholder="Code" name="coreCode[]">' + 
						'<input type="textbox" class="form-control sub-name" id="core' + coreCounter + 'Name" placeholder="Subject Name" name="coreName[]">' + 
						'<input type="textbox" class="form-control sub-tc" id="core' + coreCounter + 'tc" placeholder="TC" name="coretc[]">' + 
						'<input type="textbox" class="form-control sub-pc" id="core' + coreCounter + 'pc" placeholder="PC" name="corepc[]">' + 
						'<input type="button" value="Delete" id="core' + coreCounter + 'delete" class="btn btn-danger removeCore">' + 
					'</div>');
				newCoreBox.appendTo(".subjects");
				coreCounter++;
			});
			var eleCounter = 1;
			$("#addElective").click(function () {
				var newElectiveBox = $(document.createElement('div')).attr("id", 'elective' + eleCounter);
				newElectiveBox.after().html(
					'<label for="elective' + eleCounter + '" class="control-label col-md-3 col-sm-3 col-xs-12">Elective: </label>' + 
					'<div class="col-md-7 col-sm-6 col-xs-12">' + 
						'<input type="textbox" class="form-control sub-no" id="elective' + eleCounter + 'Code" placeholder="Code"  name="electiveCode[]">' + 
						'<input type="textbox" class="form-control sub-name" id="elective' + eleCounter + 'Name" placeholder="Subject Name"  name="electiveName[]">' + 
						'<input type="textbox" class="form-control sub-tc" id="elective' + eleCounter + 'tc" placeholder="TC"  name="electivetc[]">' + 
						'<input type="textbox" class="form-control sub-pc" id="elective' + eleCounter + 'pc" placeholder="PC"  name="electivepc[]">' + 
						'<input type="button" value="Delete" id="elective' + eleCounter + 'delete" class="btn btn-danger removeElective">' + 
					'</div>');
				newElectiveBox.appendTo(".subjects");
				eleCounter++;
			});
			$(document).on("click", ".removeCore" ,function() {
				var del = $(this).parent('div').parent('div').attr('id');
				$('#'+del).remove();
				coreCounter--;
			});
			$(document).on("click", ".removeElective" ,function() {
				var del = $(this).parent('div').parent('div').attr('id');
				$('#'+del).remove();
				eleCounter--;
			});
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