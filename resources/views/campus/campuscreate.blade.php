@extends('layouts.default')
@section('content')
<!-- MAIN CONTENT -->
<div id="content">
	<div id="content-header">
		<!-- <div id="breadcrumb"> <a href="{{ url('/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">new mainslie</a> </div> -->
		<h3>Campus</h3>
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
						<h5>Campus-info</h5>
					</div>
					<div class="widget-content nopadding">
						<form action="{{ route("campus.store") }}" method="POST" enctype="multipart/form-data">

							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<ul class="thumbnails">
								<li class="span3"> 
									<input style="display:none;" id="file-input1" name="photourl1" type='file' onchange="readURL(this);"/>                    
									<label for="file-input1">
										<i class="icon-camera"></i>.Photo1 200x200<br>
										<img id="blah" src="//placehold.it/100" alt="avatar" alt="your image" />

									</label>
									<div class="actions"><a id="preview1" class="lightbox_trigger" herf=""><i class="icon-search"></i></a> </div>

								</li>

								<li class="span3"> <a> 
									<input style="display:none;" id="file-input2" name="photourl2" type='file' onchange="readURL1(this);"/>                    
									<label for="file-input2">
										<i class="icon-camera"></i>.Photo2 200x200<br>
										<img id="blah1" src="//placehold.it/100" alt="avatar" alt="your image" />

									</label>
									<div class="actions"><a id="preview1" class="lightbox_trigger" herf=""><i class="icon-search"></i></a> </div>

								</li>
								

							</ul>

							
			
        <div class="row">
          <div class="col-sm-4"><label>RoomNo :</label>

            <input type="text" class="form-control" id="" name="roomno" style="width:40%;" maxlength="10" size="10" placeholder="Enter Room No" value="{{ old('roomno') }}" required>
            
         
          </div>
          <div class="col-sm-4">
            <label>Floor :</label>

            <input type="text" class="form-control" style="width:40%;" maxlength="20" size="20" name="floor" placeholder="Enter floor">
            
          </div> 

        </div>

   <div class="row">
          <div class="col-sm-4">
            <label>Building :</label>

            <input type="text" class="form-control" name="building" style="width:40%;" maxlength="15" size="15" placeholder="Enter building" value="{{ old('building') }}">
            
          </div>
          <div class="col-sm-4"><label>Campus :</label>

            <input type="text" class="form-control" name="campus" placeholder="Enter campus" value="{{ old('campus') }}">
            
          </div>
          

        </div>

          <div class="row">
          <div class="col-sm-4">
            <label>Room Area :</label>

            <input type="text" class="form-control" name="roomarea" style="width:40%;" maxlength="20" size="20" placeholder="Enter roomarea" value="{{ old('roomarea') }}">
            
          </div> 
          <div class="col-sm-4"><label>Room Type :</label>

            <input type="text" class="form-control" name="roomtype" placeholder="Enter roomtype" value="{{ old('roomtype') }}">
            
          </div>
          <div class="col-sm-4"><label>Seats :</label>

            <input type="text" class="form-control" name="seats" placeholder="Enter seats" value="{{ old('seats') }}">
            
          </div>
          

        </div>


        <div class="form-group">
          <label>facilities :</label>


          <textarea name="facilities" placeholder="Enter room facilities" class="form-control" rows="6"></textarea>

        </div>

           <div class="form-group">
          <label>condition :</label>


        <input type="text" class="form-control" name="condition" placeholder="Enter condition" value="{{ old('condition') }}">
            

        </div>


<div class="form-group">
          <input type="checkbox" name="available" value="1" checked>Available
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