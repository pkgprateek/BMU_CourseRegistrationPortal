@extends('layout')

@section('title', ' | Assigned Students')

@section('content')

<div class="container">

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
	                    <th>View / Edit</th>
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
		                    <td><a href="{{route('profileStudent', $student->registration_id)}}" class="btn btn-default btn-primary btns">View</a></td>
		                </tr>
	            	@endforeach
	            </tbody>
	        </table>
	    </div>
	</div>
</div>

@stop

@section('styles')

<style type="text/css" media="screen">
	.btns {
		display: inline-block;
		color: white;
	}
</style>

@stop