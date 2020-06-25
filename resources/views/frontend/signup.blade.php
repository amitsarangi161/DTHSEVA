  @extends('layouts.frontend')
  @section('content')
  <style type="text/css">
  	.order{margin: 10px 0px;
background: #fff;
padding: 15px;
box-shadow: 1px 0px 20px -7px;
border-top: 5px solid #de5e00;
}
  </style>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">

@if(Session::get('userid')['status'] =="Y")
<script type="text/javascript">
	location.replace('/');
</script>

@endif
	
	<h4 class="">Sign in</h4>
	<p class="">Hello, Welcome to your account.</p>
	@if(Session::has('meassage'))
       <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('meassage') }}</p>
     @endif
	
	<form class="register-form outer-top-xs" role="form" action="/userlogin" method="post">

		{{csrf_field()}}
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Enter Your Mobile No <span>*</span></label>
		    <input type="text"  class="form-control unicase-form-control text-input" name="mobile" required="" id='mob' >
		</div>
	  	<div class="form-group" id="password">
		    <label class="info-title" for="exampleInputPassword1">Enter Your Password <span>*</span></label>
		    <input type="password" name="password"  class="form-control unicase-form-control text-input"  >
		</div>
		<div class="form-group" id="otp1" style="display: none;">
		    <label class="info-title" for="exampleInputPassword1">Enter Your OTP <span>*</span></label>
		    <input type="text" id="otp" name="otp" class="form-control unicase-form-control text-input"  >
		</div>
		<div class="radio outer-xs">
		  
		  	<a href="#" onclick="openforgotmodal();" class="forgot-password pull-right">Forgot your Password?</a><br>
		  	<button type="button"  onclick="sendOtp();" class="pull-right btn btn-primary" style="font-weight: bold;">Login through Otp</button>

		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
	</form>					
</div>
<!-- Sign-in -->

<!-- create a new account -->

<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->


 <div class="modal fade" id="forgotpassword" role="dialog" data-backdrop="static" data-keyboard="false">

       
         <div class="container">
         <div class="row ">
           <div class="col-md-6 col-md-offset-3 ">
               <div class="order">
        <span id="msg1"></span>

        <div class="form-group">
        <label class="info-title" for="exampleInputEmail1">Enter Your Mobile No.<span>*</span></label>
        <input type="text" class="form-control unicase-form-control text-input" name="mobile" id="mobile" value="">
        </div>

        <div class="form-group" style="display: none" id='o'>
        <label class="info-title" for="exampleInputEmail1">Enter Otp <span>*</span></label>
        <input type="text" id="otp2" class="form-control unicase-form-control text-input"  >
        </div>
        <div class="form-group" style="display: none" id='n'>
        <label class="info-title" for="exampleInputEmail1">New password<span>*</span></label>
        <input type="password" id="npass" class="form-control unicase-form-control text-input"  >
        </div>
        <div class="form-group" style="display: none" id='c'>
        <label class="info-title" for="exampleInputEmail1">Confirm password<span>*</span></label>
        <input type="password" id="cpass" class="form-control unicase-form-control text-input"  >
        </div>

   
    <div class="form-group">
    <button class="btn btn-success" id="sotp" onclick="verify();" type="submit">Send Otp</button>

    <button class="btn btn-success" style="display: none;" id="votp" onclick="verifyOtp();" type="submit">Verify Otp</button>
     <button class="btn btn-success" style="display: none;" id="chpass" onclick="changepassword();" type="submit">Change Password</button>

    <button class="btn btn-danger" type="button" data-dismiss="modal">CANCEL</button>
       </div>

           </div>
         </div>
     
      </div></div>
      
      
  </div>

<script type="text/javascript">

	function changepassword()
	{
		var m=$("#mobile").val();
		var npass=$("#npass").val();
		var cpass=$("#cpass").val();

		if(npass!='' && cpass!='')
		{
            if(npass==cpass)
            {
                	$.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
            });
             

              $.ajax({
               type:'POST',
              
               url:'{{url("/changepassword")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",
                      mob: m,
                      pass:npass
                     },

               success:function(data) { 

               	   $("#msg1").html("Password or Cofirmpassword Mismatched");
               	   alert("password changed successfully");

                    $('#forgotpassword').modal('hide');
                    $("#mobile").val("");
                    $("#cpass").val("");
                    $("#npass").val("");


                   

               }
           });
            }
            else
            {
            	$("#msg1").html("Password or Cofirmpassword Mismatched");
            }
		}
		else{
			$("#msg1").html("Password or Cofirmpassword Field cant be empty");
		}
	}

	function verifyOtp(){

    var otp2=$("#otp2").val();
    
    var m=$("#mobile").val();
 
   if(otp2=='')
   {
   	$("#msg1").html("Otp can't Be blank");
   }
   else
   {
   	$.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
            });
             

              $.ajax({
               type:'POST',
              
               url:'{{url("/verifyOtp")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",
                      mob: m,
                      otp:otp2
                     },

               success:function(data) { 
               	if(data=="Otp Matched Plese Enter a new password")
               	{
               		$("#msg1").html("Otp Matched Plese Enter a new password");
                     $("#o").hide();
                     $("#votp").hide();
                     $("#chpass").show();
                     $("#n").show();
                     $("#c").show();

               	}
               	else
               	{
               		$("#msg1").html(data);
               	}
               }
           });
   }

}
	
	function verify()
	{
     
	var m=$("#mobile").val();

	if(m=='')
	{
		$("#msg1").html("mobile no can't be blank");
	}
	else
	{
         $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
            });
             

              $.ajax({
               type:'POST',
              
               url:'{{url("/sendOtp")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",
                      mob: m
                      
                     },

               success:function(data) { 

                 if(data=="Mobile Not Registered please give another number")
                 {
                 	$("#msg1").html("Invalid mobile No");
                 }
                 else
                 {  
                    $("#msg1").html("Enter Otp Sent to Your Mobile No");
                    $("#mobile").prop('disabled', true);
                    $("#sotp").hide();
                    $("#o").show();
                    $("#votp").show();
                 }
                }
              });
	}


	}
	function sendOtp() {
		var mob=$('#mob').val();
		var otp=$('#otp').val();
		if(mob=='')
		{
			alert("mobile no cant be blank");
		}
		else
		{
            $('#password').hide();
            $('#otp1').show();
            $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
            });
             

              $.ajax({
               type:'POST',
              
               url:'{{url("/sendOtp")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",
                      mob: mob
                      
                     },

               success:function(data) { 

                 alert(data)
                 $('#otp').val("");
                
                }
              });
       }

	}


	function openforgotmodal()
	{
		
        $('#forgotpassword').modal('show');
	}
</script>


@endsection