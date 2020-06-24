  @extends('layouts.frontend')
  @section('content')
  
  <style type="text/css">
  	input[type="radio"] {
    -ms-transform: scale(1.5); /* IE 9 */
    -webkit-transform: scale(1.5); /* Chrome, Safari, Opera */
    transform: scale(1.5);
}
  </style>
<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
  @if(Session::get('userid')['status'] =="N" OR Session::get('userid')['status'] =="")

<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>1</span>Login / Sign UP
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login 			
				<div class="col-md-6 col-sm-6 guest-login">
					<h4 class="checkout-subtitle">Guest or Register Login</h4>
					<p class="text title-tag-line">Register with us for future convenience:</p>

					
					<form class="register-form" role="form">
					    <div class="radio radio-checkout-unicase">  
					        <input id="guest" type="radio" name="text" value="guest" checked>  
					        <label class="radio-button guest-check" for="guest">Checkout as Guest</label>  
					          <br>
					        <input id="register" type="radio" name="text" value="register">  
					        <label class="radio-button" for="register">Register</label>  
					    </div>  
					</form>
					

					<h4 class="checkout-subtitle outer-top-vs">Register and save time</h4>
					<p class="text title-tag-line ">Register with us for future convenience:</p>
					
					<ul class="text instruction inner-bottom-30">
						<li class="save-time-reg">- Fast and easy check out</li>
						<li>- Easy access to your order history and status</li>
					</ul>

					<button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue ">Continue</button>
				</div>
				-->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login login">
					<p class="text title-tag-line">Please log in below:</p>
						@if(Session::has('meassage'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('meassage') }}</p>
                  @endif
                  @if(Session::has('emeassage'))
       <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('emeassage') }}</p>
     @endif

     @if(count($errors)>0)
     <div class="alert alert-danger">
     	@foreach($errors->all() as $error)
     	<ul>
     		<li>{{$error}}</li>
     	</ul>
     	@endforeach
     </div>

     @endif
					<form class="register-form" role="form" action="/userlogin" method="POST">
						{{csrf_field()}}
						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Registered Mobile Number<span>*</span></label>
					    <input type="text" name="mobile" class="form-control unicase-form-control text-input" id="mob" placeholder="">
					  </div>

					  <div class="form-group otp" style="display: none">
					    <label class="info-title" for="exampleInputEmail1">Enter the Otp sent <span>*</span></label>
					    <input type="number" class="form-control unicase-form-control text-input" id="otp" placeholder="" name="otp">
					  </div>

					  <div class="form-group pass" >
					    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
					    <div class="input-group">
					    <input type="password" class="form-control unicase-form-control text-input" id="pass" name="password" placeholder="">
					    
					    <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" onclick="sendOtp()"><span>Login with OTP</span></button>
  </div>
					    </div>
					    <a href="#" class="forgot-password">Forgot your Password?</a>
					  </div>
					  <button type="submit" class="btn-upper btn btn-primary checkout-page-button" ">Login</button>
					  <button type="button" class="btn-upper btn btn-primary checkout-page-button" onclick="register()">Not Register Yet</button>
					</form>
				</div>
				<!-- already-registered-login -->
<div class="col-md-6 col-sm-6 signup" style="display: none">
					<p class="text title-tag-line">Please Register below</p>

						
	<form class="register-form outer-top-xs" role="form" action="/userRegister" method="POST">
		{{csrf_field()}}
		
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" name="name" >
		</div>
		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" name="email" >
	  	</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
		    <input type="number" class="form-control unicase-form-control text-input" name="mobile" >
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" name="password" >
		</div>
         <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" name="confirmpassword" >
		</div>
	  
					  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
					  <button type="button" class="btn-upper btn btn-primary checkout-page-button" onclick="login()">Already Registered</button>
					</form>
				</div>	
				<!-- already-registered-login -->		

<!-- <div class="col-md-6 col-sm-6 signup">
	<p class="text title-tag-line">You are Loggedin!!</p>
</div> -->


			</div>
		
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>

@endif
<!-- checkout-step-01  -->

@if(Session::get('userid')['status'] =="Y")
           <form action="" method="POST">
	           {{csrf_field()}} 
					    <!-- checkout-step-02  -->	
	                   
					  	<div class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a id="ac1" data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#acinfo" >
						          <span>1</span>Account Information
						        <span style="font-size: 9px;background: #de5e00;padding: 5px;border-radius: 18px;color: #fff;float: right; margin-top: 11px;" id="a1"></span>
						      </a></h4>
						    </div>
						    <div id="acinfo" class="panel-collapse collapse in">
						      <div class="panel-body">

  
						     <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Registered Mobile<span>*</span></label>
					    <input class="form-control unicase-form-control text-input" name="mobile" value="{{Session::get('userid')['mobile']}}" type="text"  id="mobile">
					  </div>


						     <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
					    <input class="form-control unicase-form-control text-input"  value="{{Session::get('userid')['email']}}" name="email" id="email" type="email" >
					  </div>


						     <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Name<span>*</span></label>
					    <input class="form-control unicase-form-control text-input" id="name" value="{{Session::get('userid')['name']}}"  name="name" type="text">
					  </div>

						

						     <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Alternate Mobile <span>*</span></label>
					    <input class="form-control unicase-form-control text-input" id="altmobile" placeholder="" type="number" name="altmobile">
					  </div>
					       <div class="form-group">
					    <label class="info-title"  for="exampleInputEmail1">Address <span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input" id="address1" name="address1"></textarea>
					  </div>

                             <button onclick="abc();"  type="button" class="btn btn-warning">Next</button>

						      </div>
						    </div>
					  	</div>
					  
					  	</form>
					</div><!-- /.checkout-steps -->
					
					@endif
				</div>

				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
					<li><a href="#">Billing Address</a></li>
					<li><a href="#">Shipping Address</a></li>
					<li><a href="#">Shipping Method</a></li>
					<li><a href="#">Payment Method</a></li>
				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>
<!-- checkout-progress-sidebar -->				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->


		@endsection