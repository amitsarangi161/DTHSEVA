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
<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
  @if(Session::get('userid')['status'] =="N" OR Session::get('userid')['status'] =="")
<br>
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
			    <div class="col-md-12 btnmy">
			        <button type="button" style="float:left; padding:10px;margin: 3px;" class="btn-upper btn btn-primary col-md-3 checkout-page-button " onclick="register()">New Register</button>
			        <button  style="float:left; padding:10px;margin: 3px;" type="button" class="btn-upper btn btn-primary col-md-3 checkout-page-button " onclick="login()">Login Now</button>
			        <a href="/guestchkout"><button  style="float:left; padding:10px;margin: 3px;" type="button" class="btn-upper btn btn-primary col-md-3 checkout-page-button " >Guest Checkout</button></a>
			    </div>		
			    </div>		
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
				<div style="display:none" class="col-md-6 col-sm-6 already-registered-login login">
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
					    <label class="info-title" for="exampleInputEmail1">Mobile Number<span>*</span></label>
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
					    
					  </div>
					  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
					  
					  <a href="#" onclick="openforgotmodal();" class="forgot-password pull-right">Forgot your Password?</a><br>
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
           <form action="/placeOrder/{{$pid}}" method="POST">
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
					    <label class="info-title" for="exampleInputEmail1">Mobile<span>*</span></label>
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
					      <!--  <div class="form-group">
					    <label class="info-title"  for="exampleInputEmail1">Address <span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input" id="address1" name="address1"></textarea>
					  </div> -->

                             <button onclick="abc();"  type="button" class="btn btn-warning">Next</button>

						      </div>
						    </div>
					  	</div>
					  	<!-- checkout-step-02  -->
             	
						<!-- checkout-step-03  -->
					  	<div class="panel panel-default checkout-step-03">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a id="ac2" data-toggle="collapse" class="collapsed" data-parent="#accordion" >
						       		<span>2</span>Instalation Information<span style="font-size: 9px;background: #de5e00;padding: 5px;border-radius: 18px;color: #fff;float: right; margin-top: 11px;" id="a2"></span>
						        </a>
						      </h4>
						    </div>
						    <div id="shipinfo" class="panel-collapse collapse">
						      <div class="panel-body">
						     
						     <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Address <span>*</span></label>
					    <textarea  class="form-control unicase-form-control text-input" id="address" name="address" ></textarea>
					  </div>

						     <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Pincode <span>*</span></label>
					    <input class="form-control unicase-form-control text-input" id="pincode" name="pincode"  type="text">
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">City <span>*</span></label>
					    <input class="form-control unicase-form-control text-input" id="city" name="city" type="text">
					  </div>
					   <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">State <span>*</span></label>
					    <input class="form-control unicase-form-control text-input" id="state" name="state" type="text">
					  </div>
                       <button type="button" onclick="saveshippinginfo();" class="btn btn-warning">Next</button>
						      </div>
						    </div>
					  	</div>
					  	<!-- checkout-step-03  -->

						<!-- checkout-step-04  -->
					
						<!-- checkout-step-04  -->

						<!-- checkout-step-05  -->

					  	<div class="panel panel-default checkout-step-05">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a id="ac3" data-toggle="collapse" class="collapsed" data-parent="#accordion" >
						        	<span>3</span>Payment Information<span style="font-size: 9px;background: #de5e00;padding: 5px;border-radius: 18px;color: #fff;float: right; margin-top: 11px;" id="a3"></span>
						        </a>
						      </h4>
						    </div>
						    <div id="paymentinfo" class="panel-collapse collapse">
						      <div class="panel-body">


<div class="input-group pg" style="width:45%; margin:10px;float:left; background: #ff7713;padding: 10px;border-radius: 10px;text-align: center;">
		<input type="radio" class="form-control" aria-describedby="inputGroupPrepend" value="FULLAMOUNT"  id="full" name="pmode"  type="text" onclick="set(this.id)" checked="checked">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupPrepend">Pay Full Amount</span><br>
        <span class="input-group-text" id="inputGroupPrepend">INR {{$product->promocost}}+INR {{$product->installamt}} (Installation Charges)<br>Total : {{$product->promocost+$product->installamt}} </span>

</div>
        
        
</div>

<div class="input-group cod" style="width:45%; margin:10px;float:left; background: #c5c5c5;padding: 10px;border-radius: 10px;text-align: center;">
		  <input type="radio" id="booking" name="pmode" class="form-control" aria-describedby="inputGroupPrepend" value="BOOKINGAMOUNT"  type="text" onclick="set(this.id)"  >
          <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">Pay Booking Amount</span>
          <span class="input-group-text" id="inputGroupPrepend">INR {{$product->bookingamount}} <br>Rest Amount to be Paid  <br> INR {{($product->promocost)-$product->bookingamount}} (Product Cost)+ INR {{$product->installamt}} (Installation Charges)  </span>
</div>
        
        
</div>

<button type="button" onclick="savepaymentinfo();" class="btn btn-warning">Next</button>

						      </div>
						    </div>
					    </div>
					    <!-- checkout-step-05  -->

						<!-- checkout-step-06  -->
					  	<div class="panel panel-default checkout-step-06">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a id="ac4" data-toggle="collapse" class="collapsed" data-parent="#accordion"  >
						        	<span>4</span>Order Review
						        </a>
						      </h4>
						    </div>
					    	<div id="final" class="panel-collapse collapse">
					      		<div class="panel-body">
					      		 <p>Have You Any Coupon Code or Promo Code</p>
                            <input style="float:left;width:60%;border-radius:0px;" type="text" class="form-control" placeholder="Enter coupon code Here" name="couponcode" id="couponcode">
                            <button style="float:left;width:40%;border-radius:0px;" type="button" onclick="checkcouponcode();" class="btn btn-info">Apply</button><br>
					        	<br><div id="cmsg"></div><br>	<span>Total Product Cost:</span><span> INR </span><span id="pc">{{$product->promocost}}</span><br>
					        		<span>Installation  Charges:</span><span> INR </span><span id="ic">{{$product->installamt}}</span><br>
					        		<span>Discount:</span><span> INR </span><span id="dc">0</span><br>
					        		<span>Gross Total:</span><span> INR </span>
					        		<span id="gt">{{$grosst=$product->promocost+$product->installamt}}</span><br>

                                     @php
                                        $uid=Session::get('userid')['uid'];
                                        $wallet=\App\wallet::where('user_id',$uid)->get();
                                        $walletbal=$wallet->sum('credit')-$wallet->sum('debit');
                                     @endphp
                                     @if($walletbal>0)

                                      <input type="checkbox" name="walletbal" value="{{$walletbal}}" id="walletbal"> Wallet Balance {{$walletbal}} 
                                     @endif
                                     <br>
                                     <span>Net Payble:</span><span> INR </span>
					        		<span id="np">{{$product->promocost+$product->installamt}}</span><br>

					        		<br><br>
					      <input type="hidden" id="cashback_by_type" value="{{$product->cashback_by_type}}">
					      <input type="hidden" id="cashback_value" value="{{$product->cashback_value}}">
					        		
					        		@php
                                     if($product->cashback_by_type=='PERCENTAGE')
           {
            $cashback_amt=number_format((float)($product->cashback_value/100)*$product->promocost, 2, '.', '');
           }
          elseif($product->cashback_by_type=='FLAT')
            {
             $cashback_amt=number_format((float)$product->cashback_value, 2, '.', '');  
            }
                                      else
                                      {
                                      	  $cashback_amt=0;
                                      }
					        	
					        		@endphp
					     
					        @if($cashback_amt!=0)
                            <span style="color: green;font-weight: bold;font-size: 18px;" id="cashbackmsgs">After Successfully Purchase You will getRs.{{$cashback_amt}} in Your wallet</span>
					        @endif

                           <div class="products">
                           	
                           
					        <input type="hidden" name="productid" value="{{$pid}}">
					      		</div>
                                  
					              <button type="submit" class="btn btn-success btn-flat form-control">Place Order</button>
					    	</div>
					  	</div>
					  	<!-- checkout-step-06  -->
					  	</form>
					</div><!-- /.checkout-steps -->
					
					@endif
				</div>

				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->

<!-- checkout-progress-sidebar -->				</div>
<!-- checkout-progress-sidebar -->				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<div class="modal fade" id="forgotpassword" role="dialog" data-backdrop="static" data-keyboard="false">

       
         <div class="container">
         <div class="row ">
           <div class="col-md-6 col-md-offset-3 ">
               <div class="order">
        <span id="msg1"></span>

        <div class="form-group">
        <label class="info-title" for="exampleInputEmail1">Enter Your Mobile No.<span>*</span></label>
        <input type="text" class="form-control unicase-form-control text-input" name="mobile" id="mobile2" >
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

</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<script type="text/javascript">


if ($('#walletbal').is(':checked')) {
     var checkedValue = $('#walletbal:checked').val();
     
     var gt=$("#gt").text();
     var newamt=parseFloat(gt)-parseFloat(checkedValue);
    $("#np").html(newamt)
}

$("#walletbal").change(function() {
	  var gt=$("#gt").text();
    if(this.checked) {
    	var checkedValue = $('#walletbal:checked').val();
        
      
        var newamt=parseFloat(gt)-parseFloat(checkedValue);
       $("#np").html(newamt);
    }
    else
    {
       $("#np").html(gt);
    }
});



	function checkcouponcode()
	{
		var couponcode=$("#couponcode").val();
		if(couponcode=='')
		{
           
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
              
               url:'{{url("/checkcouponcode")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",
                      couponcode:couponcode
                     },

               success:function(data) { 
               	   if(data=='Invalid Coupon Code')
               	   {
                     $('#cmsg').html("<span style='color:#b91515'>"+data.status+"</span");
                     $("#couponcode").val("");
                     
               	   }
               	   else
               	   {
                       $('#cmsg').html("<span style='color:#6db407'>"+data.status+"</span");
                       $("#dc").html(data.val.amount);
                       var gt= $("#gt").html();
                       var pc= $("#pc").html();
                       var ic= $("#ic").html();
                       $("#gt").html(parseFloat(pc)+parseFloat(ic)-parseFloat(data.val.amount));

                       if ($('#walletbal').is(':checked')){
                            var checkedValue = $('#walletbal:checked').val();
                            var gt=$("#gt").text();
                            var newamt=parseFloat(gt)-parseFloat(checkedValue);
                            $("#np").html(newamt)
                       }
                       else
                       {
                       	    var gt=$("#gt").text();
                            var newamt=parseFloat(gt);
                            $("#np").html(newamt)
                       }

                       var cashback_by_type=$("#cashback_by_type").val();
                       var cashback_value=$("#cashback_value").val();

                       var newpc=parseFloat(pc)-parseFloat(data.val.amount);
                         if (cashback_by_type=='PERCENTAGE') {
                         	 ncashback=newpc*(parseFloat(cashback_value)/100);
                         }
                         else if(cashback_by_type=='FLAT')
                         {
                         	 ncashback=cashback_value;
                         }
                         else
                         {
                         	ncashback=0;
                         }
                       
                         if(ncashback!=0)
                         {
                         	$("#cashbackmsgs").html('After Successfully Purchase You will get Rs'+ncashback+ ' in Your wallet')
                         }
               	   }
               }
               });

		}
	}
	function openforgotmodal()
	{
		alert("hi");
        $('#forgotpassword').modal('show');
	}

	function changepassword()
	{
		var m=$("#mobile2").val();
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
                    $("#mobile2").val("");
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
    
    var m=$("#mobile2").val();
   
 
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
     
	var m=$("#mobile2").val();

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
                    $("#mobile2").prop('disabled', true);
                    $("#sotp").hide();
                    $("#o").show();
                    $("#votp").show();
                 }
                }
              });
	}

}
	function abc()
	{
		
       var mobile=$("#mobile").val();
       var email=$("#email").val();
       var name=$("#name").val();
       var address1=$("#address1").val();
       
       var altmobile=$("#altmobile").val();
       var filter=/^([a-z A-Z 0-9 _\.\-])+\@(([a-z A-Z 0-9\-])+\.)+([a-z A-z 0-9]{3,3})+$/;
       var pattern=/^\d{10}$/;

       if(mobile!='' && email!='' && name!='' && address1!='' && altmobile!='')
       {

if(!pattern.test(mobile))
{
alert("Phone number is in 8890000000 format ");
$("#mobile").focus();
return false;
}
if(!filter.test(email))
{
alert("Email should be myemail@gmail.com ");
$("#email").focus();
return false;
}

if(!pattern.test(altmobile))
{
alert("Alternative number is in 8890000000 format ");
$("#altmobile").focus();
return false;
}

       
       	$("#a1").empty();
       	      
       	     $('#acinfo').removeClass('in');
       	     
       	     $("#ac1").removeAttr("href");
       	     $('#shipinfo').addClass('in');
               $("#ac2").attr('href','#shipinfo');

              var x="<a href='#' onclick='openacinfo();'>change</a>";

              $("#a1").append(x);

       }
       else
       {
       	alert("Please Fillup All the details");
       }
	}
  function openacinfo()
  {
  	 $('#acinfo').addClass('in');
  	 $('#shipinfo').removeClass('in');
  	 $('#paymentinfo').removeClass('in');
  	 
  	 $("#ac2").removeAttr("href");
  	 $("#ac3").removeAttr("href");
  	 


  }


	function set(btnid)
	{

	//	alert(btnid);

		$(".input-group").css('background', '#c5c5c5');
		$("."+btnid).css('background', '#ff7713');
	}	

	function login()
	{

	//	alert(btnid);

		$(".login").show();
		$(".signup").hide();
		$(".btnmy").hide();
	}	

	function register()
	{

	//	alert(btnid);

		$(".login").hide();
		$(".signup").show();
		$(".btnmy").hide();
	}	

	function sendOtp() {
		var mob=$('#mob').val();
		var otp=$('#otp').val();
		if(mob=='')
		{
			alert("Mobile no cant be blank");
		}
		else
		{
            $('.pass').hide();
            $('.otp').show();
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

                alert("OTP sent to the registered mobile number")
                 
                }
              });
       }

	}



function saveshippinginfo()
{
	var address=$("#address").val();
	var pincode=$("#pincode").val();
	var city=$("#city").val();
	var state=$("#state").val();
   	var pat1=/^\d{6}$/;

	if(address!='' && pincode!='' && city!='' && state!='')
	{

if(!pat1.test(pincode))
{
alert("Pin code should be 6 digits ");
$("#pincode").focus();

}
else
{
	
	
	
	
          $("#a2").append(x);

            $('#shipinfo').removeClass('in');
            $("#ac2").removeAttr("href");
             $('#paymentinfo').addClass('in');
             $("#ac3").attr('href','#paymentinfo');
              var x="<a href='#' onclick='openshippinginfo();'>change</a>";

              $("#a2").append(x);
	}
	}

	else
	{
		alert("fill up all the field");
	}
}

function openshippinginfo()
{

    $('#acinfo').removeClass('in');
  	 $('#shipinfo').addClass('in');
  	 $('#paymentinfo').removeClass('in');
  	 
  	 $("#ac1").removeAttr("href");
  	 $("#ac3").removeAttr("href");
  	 

}


function savepaymentinfo()
{
          $("#a3").empty();
       	 $('#paymentinfo').removeClass('in');
        $("#ac3").removeAttr("href");
        $('#final').addClass('in');
        $('#final').attr('href','#final');

        var x="<a href='#' onclick='openpaymentinfo();'>change</a>";

              $("#a3").append(x);

       }
      
function openpaymentinfo()
{
	$('#acinfo').removeClass('in');
  	 $('#shipinfo').removeClass('in');
  	 $('#paymentinfo').addClass('in');
  	
  	 $("#ac1").removeAttr("href");
  	 $("#ac2").removeAttr("href");
  	
}


</script>









		@endsection