@extends('layouts.default')
@section('content')


<div id="content">

  <div class="container-fluid">
    <!--  <h1>Edit Profile</h1> -->

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
            <h5>Personal-info</h5>
          </div>
          <div class="widget-content nopadding">
            <form method="POST" action="{{ route("profiles.update", 0) }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" role="form">
              <input name="_method" type="hidden" value="PATCH">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a> 
                <i class="fa fa-coffee"></i>
                This is an <strong>.alert</strong>. Use this to show important messages to the user.
              </div>
              <div class="text-center">

                <!-- <div class="image-upload"> -->
                <input style="display:none;" id="file-input" name="photourl" type='file' onchange="readURL(this);" />                    
                <label for="file-input">
                 <!--  -->
                 <i class="lnr lnr-camera"></i>...photo<br>
                 @if($user->photourl!="")
                 <img id="blah" src= "{{ $user->photourl }}" width="100" height="100">
                 @else
                 <img id="blah" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
                 @endif
               </label>


             </div>

             <div class="col-lg-6">

               <div class="form-group">
                <label>Name</label>

                <input name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter Your Name" type="text" required>
              </div>


              <div class="form-group">
                <label>Email</label>
                
                 <input class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Your email" type="text" required>
              </div>



             <div class="form-group">
               <label>Phone1:</label>
               
                <input class="form-control" name="ph1" value="{{ $user->ph1 }}" placeholder="Enter Your phone1" type="text">

              
            </div>

            <div class="form-group">
               <label>Phone2:</label>
               
                <input class="form-control" name="ph2" value="{{ $user->ph2 }}" placeholder="Enter Your phone1" type="text">

              
            </div>

            <div class="form-group">
              <label>Address:</label>
             

                <textarea name="address" placeholder="Enter your address" class="form-control" rows="3">{{ $user->address }}</textarea>
             
            </div>

            <div class="form-group">
              <label>Bio:</label>
             

                <textarea name="bio" placeholder="Enter your bio" class="form-control" rows="6">{{ $user->bio }}</textarea>
              
            </div>


        <div class="form-group">
        <label>Department</label>

          <select name="department" lass="form-control">
                              <option>{{ $user->department }}</option>

            <option>Admin</option>
            <option>Operation</option>
            <option>Admission</option>
            <option>Marketing</option>
            <option>Account</option>

           <option>IT</option>
          <option>Planning</option>
          <option>Program Coordination</option>
          <option>Other</option>



          </select>
        </div>

          <div class="form-group">
              <label>Ranks:</label>
             

                <textarea name="bio" placeholder="Enter your ranks" class="form-control" rows="6">{{ $user->ranks }}</textarea>
              
            </div>



            <div class="form-group">
        <label>Work at</label>
          <select name="workat" lass="form-control">
                              <option>{{ $user->workat }}</option>

            <option>mict</option>
            <option>shwebonethar</option>
            <option>mandalay</option>
            <option>50th street campus</option>
            <option>insein</option>
           <option>other</option>
          </select>
        </div>


            <div class="form-group">
              <label>Password:</label>
             
                <input class="form-control" id="password1" name="password" type="password">
              
            </div>
            <div class="form-group">
              <label>Confirm password:</label>
              
                <input class="form-control" id="password2" name="password_confirmation" type="password">
             
            </div>



            <div class="form-actions">
             <input class="btn btn-outline btn-primary" type="submit" value="Save Changes"> 
                <!-- <button type="button" class="btn btn-outline btn-primary">Primary</button> -->
           </div>
           <br>
           <br>
           </div>
         </form>
       </div>
     </div>


   </div>
 </div>
</div>
</div>


<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#blah')
        .attr('src', e.target.result)
        .width(150)
        .height(150);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

</script>
<script type="text/javascript">
  window.onload = function () {
    document.getElementById("password1").onchange = validatePassword;
    document.getElementById("password2").onchange = validatePassword;
  }
  function validatePassword(){
    var pass2=document.getElementById("password2").value;
    var pass1=document.getElementById("password1").value;
    if(pass1!=pass2)
      document.getElementById("password2").setCustomValidity("Passwords Don't Match");
    else
      document.getElementById("password2").setCustomValidity('');  
//empty string means no validation error
}
</script>
@stop