@extends('layout')

@section('title', '| Import')

@section('content')

    <div class="container">		
		<div class="panel panel-primary">

		  	<div class="panel-body">
		  		@if ($message = Session::get('success'))
					<div class="alert alert-success" role="alert">
						{{ Session::get('success') }}
					</div>
				@endif

				@if ($message = Session::get('error'))
					<div class="alert alert-danger" role="alert">
						{{ Session::get('error') }}
					</div>
				@endif

				<h4><strong> Import File:</strong></h4>
				<form action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    
					<input type="file" name="import_file" />
					{{ csrf_field() }}
					<br/>
					<button class="btn btn-primary">Import CSV or Excel File</button>

				</form>
				<br/>
		    	
		    	<h4><strong>Download File From Database:</strong></h4>
		    	<div> 		
			    	<a href="{{ url('downloadExcel/xls') }}"><button class="btn btn-success btn-lg btn-dwld">Download Excel xls</button></a>
					<a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success btn-lg btn-dwld">Download Excel xlsx</button></a>
					<a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success btn-lg btn-dwld">Download CSV</button></a>
		    	</div>
		  	</div>

		</div>
	</div>

	@if (Route::currentRouteName() == 'add-students')
	<div class="container">
		<div class="panel panel-primary">
		  	<div class="panel-body">

				<h3>2. Add Manually</h3>
				<form action="{{ URL::to('studentManually') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
            		<div class="row">
              			<div class="col-md-12 col-sm-12 col-xs-12">
                    		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
								<div class="form-group">
									<label for="Registration" class="control-label col-md-3 col-sm-3 col-xs-12">Registration ID<span class="required">*</span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
									  	<input id="registration_id" required="required" class="form-control col-md-7 col-xs-12" type="text" name="registration_id">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" name="name">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">E-mail ID <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="email" class="form-control col-md-7 col-xs-12" required="required" type="email" name="email" placeholder="example@bml.edu.in">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Batch Year: <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="batch_year" class="form-control col-md-7 col-xs-12" required="required" type="Year" name="batch_year">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Specialization:<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
									  	<input id="specialization" class="form-control col-md-7 col-xs-12" required="required" type="text" name="specialization">
									</div>
								</div>
		                      	<div class="form-group">
			                        <label for="contact" class="control-label col-md-3 col-sm-3 col-xs-12">Contact Number <span class="required">*</span></label>
			                        <div class="col-md-6 col-sm-6 col-xs-12">
			                          	<input id="contact" class="form-control col-md-7 col-xs-12" required="required" type="tel" size="10" name="contact">
			                        </div>
		                      	</div>
                      			{{ csrf_field() }}
								<div class="form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
										<button type="submit" class="btn btn-success">Submit</button>
									</div>
								</div>
                    		</form>
	              		</div>
	            	</div>
          		</form>

	    	</div>
	  	</div>
	</div>
	@endif

	@if(Route::currentRouteName() == 'add-faculty')
	<div class="container">
		<div class="panel panel-primary">
		  <div class="panel-body">
				<h3>2. Add Manually</h3>

				<form action="{{ URL::to('facultyManually') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
            		<div class="row">
              			<div class="col-md-12 col-sm-12 col-xs-12">
                    		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
								
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name: <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" name="name">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">E-mail ID: <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="email" class="form-control col-md-7 col-xs-12" required="required" type="email" name="email" placeholder="example@bml.edu.in">
									</div>
								</div>
								
								
		                      	<div class="form-group">
			                        <label for="contact" class="control-label col-md-3 col-sm-3 col-xs-12">Contact Number: <span class="required">*</span></label>
			                        <div class="col-md-6 col-sm-6 col-xs-12">
			                          	<input id="contact" class="form-control col-md-7 col-xs-12" required="required" type="tel" size="10" name="contact">
			                        </div>
		                      	</div>
                      			{{ csrf_field() }}
								<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="btn btn-primary btn-lg">Submit</button>
								</div>
								</div>
                    		</form>
	              		</div>
	            	</div>
          		</form>
	    	</div>
	  	</div>
	</div>
	@endif
	
@stop

@section('styles')
	{{-- expr --}}
	<style type="text/css" media="screen">
		button.btn.btn-success.btn-lg.btn-dwld {
			margin-bottom: 10px;
			min-width: 200px;
			width: auto;
		}
	</style>
@stop