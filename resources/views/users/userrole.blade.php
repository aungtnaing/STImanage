@extends('layouts.default')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">profile</a> </div>
    <!-- <h1>USER LISTS</h1> -->
  </div>
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
            <form method="POST" action="{{ route("userspannel.update", $user->id) }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" role="form">
              <input name="_method" type="hidden" value="PATCH">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
             
              <div class="text-center">

              
                 <!--  -->
                 <i class="lnr lnr-camera"></i>...photo<br>
                 @if($user->photourl!="")
                 <img id="blah" src= "{{ $user->photourl }}" width="100" height="100">
                 @else
                 <img id="blah" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
                 @endif
               </label>


             </div>


             <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">

                <label>{{ $user->name }}</label>
             </div>
           </div>


           <div class="control-group">
            <label class="control-label">mName :</label>
            <div class="controls">

                   <label>{{ $user->mname }}</label>
            </div>
          </div> 

          <div class="control-group">
            <label class="control-label">Email:</label>
            <div class="controls">
                  <label>{{ $user->email }}</label>
           </div>
         </div>

         <div class="control-group">
         <label class="control-label">Role level:</label>
          <div class="controls">
               <select name="roleid">
                  @if($user->roleid==1)
                  <option value="{{ $user->roleid }}">1 : Admin</option>
                  @elseif($user->roleid==2)
                  <option value="{{ $user->roleid }}">2 : Manager</option>
                  @elseif($user->roleid==3)
                   <option value="{{ $user->roleid }}">3 : Admission Manager</option>
                  @elseif($user->roleid==4)
                  <option value="{{ $user->roleid }}">4 : Campus Manager</option>
                  @elseif($user->roleid==5)
                  <option value="{{ $user->roleid }}">5 : Staff</option>
                 
                  @else
                  <option value="{{ $user->roleid }}">User</option>
                  @endif
                  <option value="1">1 : Admin</option>
                  <option value="2">2 : Manager</option>
                  <option value="3">3 : Admission Manager</option>
                  <option value="4">4 : Campus Manager</option>
                  <option value="5">5 : Staff</option>
             
                  <option value="0">0 : User</option>
               </select>
          </div>
        </div>

     
       


        <div class="form-actions">
         <input class="btn btn-primary" type="submit" value="Save Changes"> 
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