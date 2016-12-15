@extends('layout')

@section('title', ' | View Semesters')

@section('content')

<div class="container">

	<div class="row">
	    <div class="table-responsive panel panel-default">
	        <table class="table">

	            <thead>
	                <tr>
	                    <th>S.No.</th>
	                    <th>Year</th>
	                    <th>Branch</th>
	                    <th>Name</th>
	                    <th>View / Edit</th>
	                </tr>
	            </thead>
	            <tbody>
            		@foreach ($semesters as $semester)
		            	<tr>
		                    <td><strong>{{$sno++}}.</strong></td>
		                    <td>{{$semester->year}}</td>
		                    <td>{{$semester->number}}</td>
		                    <td>{{$semester->branch}}</td>
		                    <td>
							<a href="{{ route('semesterEdit', $semester->id) }}" class="btn btn-default btn-primary btns">View / Edit</a></td>
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