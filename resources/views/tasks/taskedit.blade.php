@extends('layouts.default')
@section('content')


<div id="content">
	<div id="content-header">
		
		<h3>Task edit</h3>

	</div>
	<div class="container-fluid">

			@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif  
		<hr>

		<div class="row-fluid">

			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>task edit-info</h5>
					</div>
					<div class="widget-content">

					
					<form action="{{ route("tasks.update", $task->id) }}" method="POST" enctype="multipart/form-data">
							<input name="_method" type="hidden" value="PATCH">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<ul class="thumbnails">
								<li class="span3"> 
									<input style="display:none;" id="file-input1" name="photourl1" type='file' onchange="readURL(this);"/>                    
									<label for="file-input1">
										<i class="icon-camera"></i>.Photo 200x200<br>
										@if($task->photourl1!="")
										<img id="blah" src= "{{ $task->photourl1 }}" width="100" height="100">
										@else
										<img id="blah" src="//placehold.it/100" alt="avatar" alt="your image" />
										@endif
									</label>
									<div class="actions"><a id="preview1" class="lightbox_trigger" herf=""><i class="icon-search"></i></a> </div>

								</li>
								
								

							</ul>

							<div class="form-group">
								<label>Task Title :</label>

								<input type="text" class="form-control" name="tasktitle" placeholder="Enter title" value="{{ $task->tasktitle }}" required>
							</div>

							<div class="form-group">
								<label>Task description :</label>


								<textarea name="content" placeholder="Enter task description" class="form-control" rows="8">{{ $task->content }}</textarea>

							</div>

							<div class="form-group">
								<label>Task date :</label>

								<input type="text" class="form-control" name="taskdate" placeholder="Enter date" value="{{ $task->taskdate }}">
							</div>

							<div class="form-group">
								<label>Dead line date :</label>

								<input type="text" class="form-control" name="deadline" placeholder="Enter deadline date" value="{{ $task->deadline }}">
							</div>

							<div class="form-group">
								<label>Budget :</label>

								<input type="text" class="form-control" name="budget" placeholder="Enter budget" value="{{ $task->budget }}">
							</div>

							

							<div class="form-group">
								
								@if($task->active==0)
								<input type="checkbox" name="active" value="">Active<br>  
								@else   
								<input type="checkbox" name="active" value="" checked>Active<br>
								@endif
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




</script>
@stop

