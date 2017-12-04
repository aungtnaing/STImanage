@extends('layouts.default')
@section('content')
<div id="content">
	<div id="content-header">
		
		<h3>assign tasks</h3>
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
						<!-- <h5>assign task-info</h5> -->
					</div>
					<div class="widget-content nopadding">
						<form action="{{ route("assigntasks.store") }}" method="POST" enctype="multipart/form-data">

							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group">
								<label>Name : {{ $user->id }}</label><br>
								@if($user->roleid==1)
								<label>Role : Admin</label>
								@elseif($user->roleid==2)
								<label>Role : Manager</label>
								@elseif($user->roleid==3)
								<label>Role : Admission Manager</label>
								@elseif($user->roleid==4)
								<label>Role : Campus Manager</label>
								@elseif($user->roleid==5)
								<label>Role : Teacher</label>
								@elseif($user->roleid==10)
								<label>Role : Staff</label>
								@else
								<label>Role : User</label>
								@endif
								<br>
								<label>Ranks : {{ $user->ranks }}</label><br>
								<label>Department : {{ $user->department }}</label>

							</div>

							<div class="form-group" style="display: none;">
         

            <input type="text" class="form-control" name="userid" value="{{ $user->id }}">
            </div>

							@foreach($tasks as $task)
							<div class="form-group">
							<?php $flat=0; ?>
								@foreach($assigntasks as $assigntask)
									@if($task->id === $assigntask->taskid)
										<?php $flat=1; ?>
										<?php break; ?>
									@endif
								@endforeach
								@if($flat === 0)
								<input type="checkbox" name="{{ $task->id }}" value="1">{{ $task->tasktitle }}</span><br>
								<span>{{ $task->taskdate }}</span>
								@else
								<input type="checkbox" name="{{ $task->id }}" value="1" checked=""><span>{{ $task->tasktitle }}</span><br>
								<span>{{ $task->taskdate }}</span>
								@endif
							</div>
							@endforeach


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

<script type="text/javascript">
	function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
</script>



@stop