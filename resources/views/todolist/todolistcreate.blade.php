@extends('layouts.default')
@section('content')
<!-- MAIN CONTENT -->
<div id="content">
	<div id="content-header">
		<!-- <div id="breadcrumb"> <a href="{{ url('/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">new mainslie</a> </div> -->
		<h3>TODOLIST</h3>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<!-- <h3 class="panel-title">New Category</h3> -->
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif	
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>todolist-info</h5>
					</div>
					<div class="widget-content nopadding">
						<form action="{{ route("todolists.store") }}" method="POST" enctype="multipart/form-data">

							<input type="hidden" name="_token" value="{{ csrf_token() }}">


							
			<div class="form-group">
         <label>Task :</label>

            <input type="text" class="form-control" name="title" placeholder="Enter your task" value="{{ old('title') }}">
            </div>
          



        <div class="form-group">
          <label>Description :</label>


          <textarea name="description" placeholder="Enter your description" class="form-control" rows="5"></textarea>

        </div>


			<div class="form-group">
         <label>Task Date :</label>

            <input type="text" class="form-control" name="tdate" placeholder="Enter your task date" value="{{ old('tdate') }}">
            </div>


			<div class="form-group">
         <label>Status (work done %):</label>

            <input type="text" class="form-control" name="status" placeholder="Enter your work done status" value="{{ old('status') }}">
            </div>

     		 <div class="form-group">
          <input type="checkbox" name="done" value="1" checked>Done
        </div>

								 <div class="form-group">
          <input type="checkbox" name="active" value="1" checked>Active
        </div>



							<div class="form-actions">
								<input class="btn btn-primary" type="submit" value="Save"> 
							</div>
						</form>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>



	<script src="<?php echo url(); ?>/assets/js/jquery.min.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/jquery.ui.custom.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/bootstrap.min.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/bootstrap-colorpicker.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/bootstrap-datepicker.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/jquery.toggle.buttons.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/masked.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/jquery.uniform.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/select2.min.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/matrix.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/matrix.form_common.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/wysihtml5-0.3.0.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/jquery.peity.min.js"></script> 
	<script src="<?php echo url(); ?>/assets/js/bootstrap-wysihtml5.js"></script> 

	<script>
		$('.textarea_editor').wysihtml5();
	</script>

<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah')
				.attr('src', e.target.result)
				.width(100)
				.height(100);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}


function readURL1(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah1')
				.attr('src', e.target.result)
				.width(100)
				.height(100);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

<script type="text/javascript">
		function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
	</script>



@stop