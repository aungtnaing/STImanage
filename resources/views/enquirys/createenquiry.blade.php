@extends('layouts.defaultfull')
@section('content')
<!-- MAIN CONTENT -->



<!-- /.row -->
<div class="row" style="margin-right: 0px; margin-left: 0px;">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
       New Enquiry Form
     </div>

     <form action="{{ route("enquirys.store") }}" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="_token" value="{{ csrf_token() }}">




      <div class="form-group">

        <div class="row">
          <div class="col-sm-4"><label>Name :</label>

            <input type="text" class="form-control" id="" name="name" placeholder="Enter name" value="{{ old('name') }}" required>
            
          </div>
          <div class="col-sm-4"><div class="form-group">
            <label>Age :</label>

            <input type="text" class="form-control" style="width:20%;" maxlength="4" size="4" name="age" placeholder="Enter age">
            
          </div> </div>

        </div>

        <div class="row">
          <div class="col-sm-4"><div class="form-group">
            <label>Mother's Name :</label>

            <input type="text" class="form-control" name="mumname" placeholder="Enter mother name" value="{{ old('mumname') }}">
            
          </div> </div>
          <div class="col-sm-4"><label>Father's Name :</label>

            <input type="text" class="form-control" name="fatname" placeholder="Enter father name" value="{{ old('fatname') }}">
            
          </div>
          

        </div>

        <div class="form-group">
          <label>Parent's Occupation :</label>


          <textarea name="parentocc" placeholder="Enter your parent's occupation" class="form-control" rows="2"></textarea>

        </div>

        <div class="form-group">
          <label>Address :</label>


          <textarea name="address" placeholder="Enter your address" class="form-control" rows="2"></textarea>

        </div>

        <div class="row">
          <div class="col-sm-4"><div class="form-group">
            <label>Contact Number :</label>

            <input type="text" class="form-control" name="phone" placeholder="Enter contact number" value="{{ old('phone') }}" required>
            
          </div> </div>
          <div class="col-sm-4"><label>Email :</label>

            <input type="text" class="form-control" id="" name="email" placeholder="Enter email" value="{{ old('email') }}">
            
          </div>
          

        </div>

        <div class="form-group">
          <label>Highest Educational attainment :</label>


          <textarea name="highestedu" placeholder="Enter your education" class="form-control" rows="3"></textarea>

        </div>
        <div class="form-group">
          <label>Name of school attended :</label>

          <input type="text" class="form-control" name="nameofschool" placeholder="Enter name of school" style="width:50%;" value="{{ old('nameofschool') }}">

        </div>

        <div class="form-group">
          <label>How did you know about our school :</label>


          <textarea name="ourschool" placeholder="How did you know about our school" class="form-control" rows="3"></textarea>

        </div>


        <div class="form-group">
          <label>Total Marks :</label>

          <input type="text" class="form-control" style="width:20%;" name="totalmarks" placeholder="Enter marks">

        </div>

        <div class="row">
          <div class="col-sm-3"><div class="form-group">
            <label>English :</label>

            <input type="text" class="form-control" name="english" style="width:20%;" placeholder="english" value="{{ old('english') }}">
            
          </div> </div>
          <div class="col-sm-3"><label>Mathematics :</label>

            <input type="text" class="form-control" style="width:20%;" name="mathematics" placeholder="mathematics" value="{{ old('mathematics') }}">
            
          </div>
          

        </div>

        <div class="row">
          <div class="col-sm-3"><div class="form-group">
            <label>Physics :</label>

            <input type="text" class="form-control" name="physics" style="width:20%;" placeholder="physics" value="{{ old('physics') }}">
            
          </div> </div>
          <div class="col-sm-3"><label>Chemistry :</label>

            <input type="text" class="form-control" style="width:20%;" name="chemistry" placeholder="chemistry" value="{{ old('chemistry') }}">
            
          </div>
          

        </div>

        <div class="row">
          <div class="col-sm-3"><div class="form-group">
            <label>Biology :</label>

            <input type="text" class="form-control" name="biology" style="width:20%;" placeholder="biology" value="{{ old('biology') }}">
            
          </div> </div>
          <div class="col-sm-3"><label>Myanmar :</label>

            <input type="text" class="form-control" style="width:20%;" name="myanmar" placeholder="myanmar" value="{{ old('myanmar') }}">
            
          </div>
          

        </div>

        <div class="form-group">
          <label>Others marks :</label>

          <input type="text" class="form-control" name="others" placeholder="Enter other marks" style="width:50%;" value="{{ old('others') }}">

        </div>

        <br>

        <label>IGCSE/O Level</label>




        <div class="row">
          <div class="col-sm-3"><div class="form-group">
            <label>English :</label>

            <input type="text" class="form-control" name="igcseenglish" style="width:20%;" placeholder="english" value="{{ old('igcseenglish') }}">
            
          </div> </div>
          <div class="col-sm-3"><label>Pure Maths:</label>

            <input type="text" class="form-control" style="width:20%;" name="igcsepuremaths" placeholder="pure maths" value="{{ old('igcsepuremaths') }}">
            
          </div>
          

        </div>

        <div class="row">
          <div class="col-sm-3"><div class="form-group">
            <label>Maths :</label>

            <input type="text" class="form-control" name="igcsemaths" style="width:20%;" placeholder="Maths" value="{{ old('igcsemaths') }}">
            
          </div> </div>
          <div class="col-sm-3"><label>Physics :</label>

            <input type="text" class="form-control" style="width:20%;" name="igcsephysics" placeholder="physics" value="{{ old('igcsephysics') }}">
            
          </div>
          

        </div>

        <div class="row">
          <div class="col-sm-3"><div class="form-group">
            <label>Chemistry :</label>

            <input type="text" class="form-control" name="igcsechemistry" style="width:20%;" placeholder="chemistry" value="{{ old('igsechemistry') }}">
            
          </div> </div>
          <div class="col-sm-3"><label>Biology :</label>

            <input type="text" class="form-control" style="width:20%;" name="igcsebiology" placeholder="biology" value="{{ old('igcsebiology') }}">
            
          </div>
          

        </div>

        <div class="form-group">
          <label>Others marks :</label>

          <input type="text" class="form-control" name="igcseothers" placeholder="Enter other marks" style="width:50%;" value="{{ old('igcseothers') }}">

        </div>

        <div class="form-group">
          <label>Program interested in :</label>

          <input type="text" class="form-control" name="programinterested" placeholder="Enter program" style="width:50%;" value="{{ old('program') }}">

        </div>

        <div class="form-group">
          <label>Interviewer Name :</label>

          <input type="text" class="form-control" name="interview" placeholder="Enter Interviewer name" style="width:50%;" value="{{ old('interview') }}">

        </div>

        <div class="form-group">
        <label>Campus</label>
          <select name="campus" lass="form-control">
            <option>mict</option>
            <option>shwebonethar</option>
            <option>mandalay</option>
            <option>50th street campus</option>
           <option>other</option>
          </select>
        </div>

         <div class="form-group">
          <label>Remarks :</label>


          <textarea name="remarks" placeholder="Enter remarks" class="form-control" rows="3"></textarea>

        </div>



        <div class="form-group" style="display: none;">
          <input type="checkbox" name="active" value="1" checked>Active
        </div>
        </div>

        <div class="form-actions">
          <input class="btn btn-outline btn-primary" name="public" type="submit" value="Save"> 
        </div>
      </form>

    </div>
  </div>

</div>







@stop