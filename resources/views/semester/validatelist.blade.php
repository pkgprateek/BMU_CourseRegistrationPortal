@extends('layout')

@section('title', ' | Validation Requests')

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
	                    <th>Semester</th>
	                    <th>Validate</th>
	                </tr>
	            </thead>
	            <tbody>
            		@foreach ($forms as $form)
		            	<tr>
		                    <td><strong>{{$sno++}}.</strong></td>
		                    <td>{{$form->registration_id}}</td>
		                    <td>{{$form->name}}</td>
		                    <td>{{$form->batch}}</td>
		                    <td>{{$form->branch}}</td>
		                    <td>{{$form->semester}}</td>
		                    <td><a href="{{route('openForm', $form->registration_id)}}" class="btn btn-default btn-primary btns">Open</a></td>
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

