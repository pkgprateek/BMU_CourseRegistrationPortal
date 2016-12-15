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
								<img src="/img/avatar5.png" class="img-circle" alt="User Image">
							</div>
						</div>

						<div class="form-group" style="margin-top: 60px;">
							<strong style="margin-right: 5px;">Name: </strong>
							{{$faculty->name}}
						</div>
						<div class="form-group">
							<strong style="margin-right: 5px;">Email: </strong>
							{{$faculty->email}}
						</div>
						<div class="form-group">
							<strong style="margin-right: 5px;">Contact: </strong>
							{{$faculty->contact}}
						</div>
					</div>
			</div>
		</div>
	</div>

	<div class="row">
	    <div class="table-responsive panel panel-default">
	        <table class="table">
	            <thead>
	                <tr>
	                    <th>S.No.</th>
	                    <th>Registration Id</th>
	                    <th>Name</th>
	                    <th>Batch Year</th>
	                    <th>Branch</th>
	                    <th>Email</th>
	                    <th>Contact</th>
	                </tr>
	            </thead>
	            <tbody>
            		@foreach ($students as $student)
		            	<tr>
		                    <td><strong>{{$sno++}}.</strong></td>
		                    <td>{{$student->registration_id}}</td>
		                    <td>{{$student->name}}</td>
		                    <td>{{$student->batch_year}}</td>
		                    <td>{{$student->specialization}}</td>
		                    <td>{{$student->email}}</td>
		                    <td>{{$student->contact}}</td>
		                </tr>
	            	@endforeach
	            </tbody>
	        </table>
	    </div>
	</div>
</div>


@stop