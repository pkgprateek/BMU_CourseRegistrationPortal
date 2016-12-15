@extends('layout')

@section('title', ' | Assign Faculty')

@section('content')
    <div class="container">
    	<div class="well form-group mssg" style="background-color: green;">
    		Faculty Assigned Successfuly.
    	</div>
		<div class="row well">
			<div class="form-group">
				<label for="select-faculty"><h4>Select Faculty:</h4></label>
				<select class="form-control" id="select-faculty" name="selectFaculty">
					<option value=""></option>
					@foreach ($faculties as $faculty)
						<option value="{{$faculty->name}}">{{$faculty->name}}</option>
					@endforeach
                </select>
			</div>
		</div>

        <div class="row well">
            <div class="form-group">
            	<label for="selectFaculty"><h4>Select Students:</h4></label>
                <input class="form-control" name="search" id="search" placeholder="Search Here..">
            </div>
        </div>
        <div class="row">
            <div class="table-responsive panel panel-default">
            	<div class="result">
	                <table class="table">
	                    <thead>
	                        <tr>
	                            <th><input type="checkbox" name="checker" id="checkAll"></th>
	                            <th>S.No.</th>
	                            <th>Registration Id</th>
	                            <th class="left-align">Name</th>
	                            <th class="centerDrop">
	                                <select id="batchYear" class="form-control">
	                                    <option value="">Batch</option>
	                                    <option value="<?php echo date('Y') - 3; ?>"><?php echo date("Y") - 3; ?></option>
	                                    <option value="<?php echo date('Y') - 2; ?>"><?php echo date("Y") - 2; ?></option>
	                                    <option value="<?php echo date('Y') - 1; ?>"><?php echo date("Y") - 1; ?></option>
	                                    <option value="<?php echo date('Y'); ?>"><?php echo date("Y"); ?></option>
	                                </select>
	                            </th>
	                            <th class="centerDrop">
	                                <select id="branch" class="form-control">
	                                    <option value="">Branch</option>
	                                    <option value="CE">CE</option>
	                                    <option value="CSC">CSC</option>
	                                    <option value="CSE">CSE</option>
	                                    <option value="ECE">ECE</option>
	                                    <option value="ME">ME</option>
	                                </select>
	                            </th>
	                            <th>Contact</th>
	                            <th>View / Edit</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    </tbody>
	                </table>
	            </div>
            </div>
        </div>
        <div class="row pages">
        	<ul id="pagination" class="pagination-md"></ul>
        </div>
        {{ csrf_field() }}
        <div class="row">
			<div class="form-group"> 
				<button type="submit" class="btn btn-success assign-submit pull-right form-control">Submit</button>
			</div>
		</div>

    </div>
@stop

@section('scripts')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js"></script>

	<script src="/js/searchStudent.js" type="text/javascript" charset="utf-8" async defer></script>

	<script type="text/javascript">
		$('.mssg').hide();
		$.ajaxSetup({
	        headers: {
        	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	}
		});
		$("#select-faculty").select2({
			placeholder: "Select Here..",
			allowClear: true
		});
		$('.assign-submit').click(function () {
			var fac = $('#select-faculty').val();
			$("input[name=chkbox]:checked").each(function () {
		        $.ajax({
		            url: 'assignFaculty',
		            type: 'post',
		            dataType: 'json',
		            data: {'fac': fac, 'stu': $(this).val()},
		            success: function (data) {
		                $('.mssg').show();
		                $('.mssg').fadeOut(2000);
		                $("body").scrollTop(0);
		            }
		        });
		    });
		});
	</script>
@stop

@section('styles')

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <style type="text/css" media="screen">
        thead tr th, tbody tr td, .pages{
            text-align: center;
        } 
        .left-align {
            text-align: left;
        }
        .centerDrop {
            text-align: center;
            width: 108px;
            min-width: 108px;
        }
        #deleteChecked, #items {
            max-width: 160px;
            margin-bottom: 16px;
        }
        .select-2-container {
        	width: auto;
        }
        .select2-container .select2-selection--single {	
		    height: auto; 
		}
		.mssg {
			color: white;
		}
    </style>
@stop