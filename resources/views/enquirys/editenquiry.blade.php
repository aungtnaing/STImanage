@extends('layouts.default')
@section('content')


<div id="content">
	<div id="content-header">
		
		<h3>Edit Enquiry</h3>

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
						<h5>enquiry-info</h5>
					</div>
					<div class="widget-content">

						<form action="{{ route("enquirys.update", $enquiry->id) }}" method="POST" enctype="multipart/form-data">
							<input name="_method" type="hidden" value="PATCH">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							



							

							
							<div class="form-group">

								<div class="row">
									<div class="col-sm-4"><label>Name :</label>

										<input type="text" class="form-control" id="" name="name" placeholder="Enter name" value="{{ $enquiry->name }}" required>

									</div>
									<div class="col-sm-4"><div class="form-group">
										<label>Age :</label>

										<input type="text" class="form-control" style="width:20%;" maxlength="4" size="4" name="age" value="{{ $enquiry->age }}" placeholder="Enter age">

									</div> </div>

								</div>

								<div class="row">
									<div class="col-sm-4"><div class="form-group">
										<label>Mother's Name :</label>

										<input type="text" class="form-control" name="mumname" placeholder="Enter mother name" value="{{ $enquiry->mumname }}">

									</div> </div>
									<div class="col-sm-4"><label>Father's Name :</label>

										<input type="text" class="form-control" name="fatname" placeholder="Enter father name" value="{{ $enquiry->fatname }}">

									</div>


								</div>

								<div class="form-group">
									<label>Parent's Occupation :</label>


									<textarea name="parentocc" placeholder="Enter your parent's occupation" class="form-control" rows="2">{{ $enquiry->parentocc }}</textarea>

								</div>

								<div class="form-group">
									<label>Address :</label>


									<textarea name="address" placeholder="Enter your address" class="form-control" rows="2">{{ $enquiry->address }}</textarea>

								</div>

								<div class="row">
									<div class="col-sm-4"><div class="form-group">
										<label>Contact Number :</label>

										<input type="text" class="form-control" name="phone" placeholder="Enter contact number" value="{{ $enquiry->phone }}" required>

									</div> </div>
									<div class="col-sm-4"><label>Email :</label>

										<input type="text" class="form-control" id="" name="email" placeholder="Enter email" value="{{ $enquiry->email }}">

									</div>


								</div>

								<div class="form-group">
									<label>Highest Educational attainment :</label>


									<textarea name="highestedu" placeholder="Enter your education" class="form-control" rows="3">{{ $enquiry->highestedu }}</textarea>

								</div>
								<div class="form-group">
									<label>Name of school attended :</label>

									<input type="text" class="form-control" name="nameofschool" placeholder="Enter name of school" style="width:50%;" value="{{ $enquiry->nameofschool }}"">

								</div>

								<div class="form-group">
									<label>How did you know about our school :</label>


									<textarea name="ourschool" placeholder="How did you know about our school" class="form-control" rows="3">{{ $enquiry->ourschool }}</textarea>

								</div>


								<div class="form-group">
									<label>Total Marks :</label>

									<input type="text" class="form-control" style="width:20%;" name="totalmarks" placeholder="Enter marks" value="{{ $enquiry->totalmarks }}">

								</div>

								<div class="row">
									<div class="col-sm-3"><div class="form-group">
										<label>English :</label>

										<input type="text" class="form-control" name="english" style="width:20%;" placeholder="english" value="{{ $enquiry->english }}">

									</div> </div>
									<div class="col-sm-3"><label>Mathematics :</label>

										<input type="text" class="form-control" style="width:20%;" name="mathematics" placeholder="mathematics" value="{{ $enquiry->mathematics }}">

									</div>


								</div>

								<div class="row">
									<div class="col-sm-3"><div class="form-group">
										<label>Physics :</label>

										<input type="text" class="form-control" name="physics" style="width:20%;" placeholder="physics" value="{{ $enquiry->physics }}">

									</div> </div>
									<div class="col-sm-3"><label>Chemistry :</label>

										<input type="text" class="form-control" style="width:20%;" name="chemistry" placeholder="chemistry" value="{{ $enquiry->chemistry }}">

									</div>


								</div>

								<div class="row">
									<div class="col-sm-3"><div class="form-group">
										<label>Biology :</label>

										<input type="text" class="form-control" name="biology" style="width:20%;" placeholder="biology" value="{{ $enquiry->biology }}">

									</div> </div>
									<div class="col-sm-3"><label>Myanmar :</label>

										<input type="text" class="form-control" style="width:20%;" name="myanmar" placeholder="myanmar" value="{{ $enquiry->myanmar }}">

									</div>


								</div>

								<div class="form-group">
									<label>Others marks :</label>

									<input type="text" class="form-control" name="others" placeholder="Enter other marks" style="width:50%;" value="{{ $enquiry->others }}">

								</div>

								<br>

								<label>IGCSE/O Level</label>




								<div class="row">
									<div class="col-sm-3"><div class="form-group">
										<label>English :</label>

										<input type="text" class="form-control" name="igcseenglish" style="width:20%;" placeholder="english" value="{{ $enquiry->english }}">

									</div> </div>
									<div class="col-sm-3"><label>Pure Maths:</label>

										<input type="text" class="form-control" style="width:20%;" name="igcsepuremaths" placeholder="pure maths" value="{{ $enquiry->igcsepuremaths }}">

									</div>


								</div>

								<div class="row">
									<div class="col-sm-3"><div class="form-group">
										<label>Maths :</label>

										<input type="text" class="form-control" name="igcsemaths" style="width:20%;" placeholder="Maths" value="{{ $enquiry->igcsemaths }}">

									</div> </div>
									<div class="col-sm-3"><label>Physics :</label>

										<input type="text" class="form-control" style="width:20%;" name="igcsephysics" placeholder="physics" value="{{ $enquiry->physics }}">

									</div>


								</div>

								<div class="row">
									<div class="col-sm-3"><div class="form-group">
										<label>Chemistry :</label>

										<input type="text" class="form-control" name="igcsechemistry" style="width:20%;" placeholder="chemistry" value="{{ $enquiry->igcsechemistry }}">

									</div> </div>
									<div class="col-sm-3"><label>Biology :</label>

										<input type="text" class="form-control" style="width:20%;" name="igcsebiology" placeholder="biology" value="{{ $enquiry->igcsebiology }}">

									</div>


								</div>

								<div class="form-group">
									<label>Others marks :</label>

									<input type="text" class="form-control" name="igcseothers" placeholder="Enter other marks" style="width:50%;" value="{{ $enquiry->igcseothers }}">

								</div>

								<div class="form-group">
									<label>Program interested in :</label>

									<input type="text" class="form-control" name="programinterested" placeholder="Enter program" style="width:50%;" value="{{ $enquiry->programinterested }}">

								</div>

								<div class="form-group">
									<label>Interviewer Name :</label>

									<input type="text" class="form-control" name="interview" placeholder="Enter Interviewer name" style="width:50%;" value="{{ $enquiry->interview }}">

								</div>

								<div class="form-group">
									<label>Campus</label>
									<select name="campus" lass="form-control">
										<option>{{ $enquiry->campus }}</option>
										<option>mict</option>
										<option>shwebonethar</option>
										<option>mandalay</option>
										<option>50th street campus</option>
										<option>other</option>
									</select>
								</div>

								<div class="form-group">
									<label>Remarks :</label>


									<textarea name="remarks" placeholder="Enter remarks" class="form-control" rows="3">{{ $enquiry->remarks }}</textarea>

								</div>




								<div class="form-group">

								@if($enquiry->active==0)
									<input type="checkbox" name="active" value="">Active<br>  
									@else   
									<input type="checkbox" name="active" value="" checked>Active<br>
									@endif
								</div>

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




// $(document).ready(function(){
//     $("#file-input1").on('change',function(){
//         //do whatever you want
//         document.getElementById("preview1").src = $(this).src;
//     });
// });
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
@stop

