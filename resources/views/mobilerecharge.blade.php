@extends('layouts.frontend')

@section('content')
@php
$idnum=Session::get('userid')['uid'];
if($idnum!='')
{
      $wallet=\App\wallet::where('user_id',$idnum)->get();
      $walletbal=$wallet->sum('credit')-$wallet->sum('debit');
}
else
{
   $walletbal='';
}

@endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
.panel{
  border-radius: 0px!important;
}
.panel-shadow {
    box-shadow: 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12), 0 5px 5px -3px rgba(0, 0, 0, .2);
}
.tab-content {
    padding-left: 0px!important;
}
.agile-price span {
    border: 1px solid #ccc;
    border-radius: 50%;
    width: 80px;
    height: 80px;
    display: block;
    color: #fff;
    padding: 34px 0;
    text-align: center;
    background-color: #22c6be;
}
  .nav-tabs > li > a{border-radius: 0px;}
  .nav-tabs {
     overflow-x: auto;
    overflow-y: hidden;
    display: -webkit-box;  
    display: -moz-box;   
  }
.nav-tabs>li {
      float:none;
    }
div.scrollmenu {
  background-color: #701e9d;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 25px;
  text-decoration: none;
  font-size: 14px;
}
.plans td {
    padding: 1.8rem;
}
.text-5 {
    font-size: 21px !important;
    font-size: 1.3125rem !important;
}
.order
{
	margin: 10px 0px;
	background: #fff;
	padding: 15px;
	box-shadow: 1px 0px 20px -7px;
	border-top: 5px solid #de5e00;
}
</style>

<div class="body-content">
    <div class="loader">
       
    </div>
	<div class="container">
    <div class="contact-page">
		<div class="row">

				<div class="col-md-12 contact-form">
	<div class="col-md-8 col-md-offset-2 contact-title">
		<h4>Mobile Recharge</h4>
	</div>
	<form action="/rechargeOrder" method="POST">
		{{csrf_field()}}
  <div class="col-md-8 col-md-offset-2">
    <div class="form-group">
      <label for="sel1"><strong>Prepaid or Postpaid?</strong></label><br>

       <input type="radio" id="prepaid" name="type" value="PREPAID" checked="">
       <label for="prepaid"><strong>PREPAID</strong></label>
       <input type="radio" id="postpaid" name="type" value="POSTPAID">
       <label for="postpaid"><strong>POSTPAID</strong></label><br>
      </div>
    
      <div class="form-group">
        <label for="sel1">Select a Operator</label>
        <select class="form-control"  name="brandid" id="brand" required="">
        	<option value="">Select a Operator</option>
        	@foreach($operators as $operator)
          <option value="{{$operator->id}}">{{$operator->operatorname}}</option>
         @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="state">Select Circle</label>
        <select class="form-control"  name="brandid" id="brand" required="">
          <option value="">Select Circle</option>
          <option value="Andhra Pradesh Telangana">Andhra Pradesh Telangana</option>
          <option value="Assam">Assam</option>
          <option value="Bihar Jharkhand">Bihar Jharkhand</option>
          <option value="Chennai">Chennai</option>
          <option value="Delhi NCR">Delhi NCR</option>
          <option value="Gujarat">Gujarat</option>
          <option value="Haryana">Haryana</option>
          <option value="Himachal Pradesh">Himachal Pradesh</option>
          <option value="Jammu Kashmir">Jammu Kashmir</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Kerala">Kerala</option>
          <option value="Kolkata">Kolkata</option>
          <option value="Madhya Pradesh Chhattisgarh">Madhya Pradesh Chhattisgarh</option>
          <option value="Maharashtra Goa">Maharashtra Goa</option>
          <option value="Mumbai">Mumbai</option>
          <option value="North East">North East</option>
          <option value="Orissa">Orissa</option>
          <option value="Punjab">Punjab</option>
          <option value="Rajasthan">Rajasthan</option>
          <option value="Tamil Nadu">Tamil Nadu</option>
          <option value="UP East">UP East</option>
          <option value="UP West">UP West</option>
          <option value="West Bengal">West Bengal</option>
        </select>
      </div>
    
  </div>

	<div class="col-md-8 col-md-offset-2">
		
			<div class="form-group">
		    <label class="info-title" for="exampleInputName">Mobile No.<span>*</span></label>
		    <input type="number" class="form-control unicase-form-control text-input" id="rmn" name="mobile" required="">
		  </div>
		
	</div>
  <div class="col-md-8 col-md-offset-2">
    
      
         <button type="button" onclick="openplan();" class="pull-right btn btn-primary btn-sm">view plans</button>

    
  </div>
	
	<div class="col-md-8 col-md-offset-2">
			<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Amount<span>*</span></label>
		    <input type="number" class="form-control unicase-form-control text-input" id="amt" autocomplete="off" name="amount" required="">

        <span style="color: red;font-weight: bold;">* Minimum Recharge Amount Rs 10.00</span>
		  </div>
	</div>
    @if($walletbal>0)
    <div class="col-md-8 col-md-offset-2">
      <div class="checkbox">
            <label style="font-weight: bold;color: blue;"><input type="checkbox" value="" name="walllet_bal" id="walllet_bal">Use Rs: {{$walletbal}} Wallet balance</label>
      </div>
  </div>
  @endif
	<div class="col-md-8 col-md-offset-2 outer-bottom-small m-t-20">
		<button onclick="recharge()" type="button" class="btn-upper btn btn-primary checkout-page-button">Recharge</button>
	</div>
</div>
</form>
			</div><!-- /.contact-page -->
		</div><!-- /.row -->
</div>

<!--recharge plan-->
<div id="view-plans" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Browse Plans</h5>
        <div class="scrollmenu">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Section 1</a></li>
            <li><a href="#tab2" data-toggle="tab">Section 2</a></li>
            <li><a href="#tab2" data-toggle="tab">Section 3</a></li>
            <li><a href="#tab2" data-toggle="tab">Section 4</a></li>
            <li><a href="#tab2" data-toggle="tab">Section 5</a></li>
            <li><a href="#tab2" data-toggle="tab">Section 6</a></li>
            <li><a href="#tab2" data-toggle="tab">Section 7</a></li>
          </ul>
        </div>
      </div>
      <div class="modal-body">

          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
               <div class="panel panel-info panel-shadow">
                <div class="panel-body">
                  <div class="row">
                      <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                        <div class="agile-price">
                           <span>₹. 10</span> 
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                        <span>Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.</span>
                      </div>
                      <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                        <button class="btn btn-sm btn-info shadow-none text-nowrap pull-right" type="submit">Select</button>
                      </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-info panel-shadow">
                <div class="panel-body">
                  <div class="row">
                      <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                        <div class="agile-price">
                           <span>₹. 10</span> 
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                        <span>Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.</span>
                      </div>
                      <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                        <button class="btn btn-sm btn-info shadow-none text-nowrap pull-right" type="submit">Select</button>
                      </div>
                    </div>
                </div>
            </div><div class="panel panel-info panel-shadow">
                <div class="panel-body">
                  <div class="row">
                      <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                        <div class="agile-price">
                           <span>₹. 10</span> 
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                        <span>Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.</span>
                      </div>
                      <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                        <button class="btn btn-sm btn-info shadow-none text-nowrap pull-right" type="submit">Select</button>
                      </div>
                    </div>
                </div>
            </div>
                

            </div>
            <div class="tab-pane" id="tab2">
              <div class="tab-pane active" id="tab1">
               <div class="panel panel-info panel-shadow">
                <div class="panel-body">
                  <div class="row">
                      <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                        <div class="agile-price">
                           <span>₹. 10</span> 
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                        <span>Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.Full Talktime + 100 SMS per day for 90 days.</span>
                      </div>
                      <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                        <button class="btn btn-sm btn-info shadow-none text-nowrap pull-right" type="submit">Select</button>
                      </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div>

<!-- LOGIN MODAL START -->
 <div class="modal fade" id="login" role="dialog">

      
         <div class="container">
         <div class="row ">
           <div class="col-md-6 col-md-offset-3 ">
               <div class="order">
     <form class="register-form outer-top-xs" role="form" action="/userlogin" method="post">

		{{csrf_field()}}
               	<h3>Login to your account first</h3>
    <div  id="msg2">        	
    
    </div>
    <div class="form-group">
        <label class="info-title" for="exampleInputEmail2">Mobile No. <span>*</span></label>
        <input type="text" id="mob" class="form-control unicase-form-control text-input" value="" >
      </div>

    <div class="form-group" id="p">
        <label class="info-title" for="exampleInputEmail2">Password <span>*</span></label>
        <input type="password" id="pass" class="form-control unicase-form-control text-input" value="" >
      </div>

    <div class="form-group" style="display:none;" id="op">
        <label class="info-title" for="exampleInputEmail2">OTP <span>*</span></label>
        <input type="password" id="otp" class="form-control unicase-form-control text-input" value="" >
      </div>
      <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" onclick="sendOtp()"><span>Login with OTP</span></button>
  </div>
					   
					   
					 
    <div class="form-group">
    <button class="btn btn-success" type="button" onclick="loginnow()">Login</button>
    <button class="btn btn-danger" type="button" data-dismiss="modal">CANCEL</button>
      <a href="#" onclick="openforgotmodal();" >Forgot your Password?</a><br>
            </div>
       </div>
   </form>
           </div>
         </div>

         </div>
     
      </div>
      
      
  </div>
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


@php
$idnum=Session::get('userid')['uid'];

@endphp

<script type="text/javascript">
function openplan(){
  $('#view-plans').modal('show');
}


  function openforgotmodal()
  {
    
   $('#login').modal('hide');
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
	function recharge()
	{
    var brand=$('#brand').val();
    var rmn=$('#rmn').val();
    var amt=$('#amt').val();

    var chk=false;

  if(brand=='')
  {
     alert("Please Select a Provider");
     return;
  }

  else if(!rmn.match('[0-9]{10}'))  {
                alert("Please put 10 digit mobile number");
                return;
    }
  else if(amt<10)
  {
          alert("Minimum Recharge Amount in Rs.10");
                return;
  }

  else
  {
     chk=true;
  }



if (chk) {
  var uid="{!! $idnum !!}" ;

    if(uid=="")
    {
      $('#login').modal('show');
    }
    else
    {
         dorechargeorder();
    }
}
		
		
	}

	function loginnow()
	{
		var mob=$('#mob').val();
		var otp=$('#otp').val();
		var pass=$('#pass').val();
		
           
            $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
            });
             

              $.ajax({
               type:'POST',
              
               url:'{{url("/ajaxlogin")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",
                      mobile: mob,
                      otp: otp,
                      password: pass
                      
                     },

               success:function(data) { 

                if(data.status=="Y")
                {
                    dorechargeorder();
                }
                else
                {
                    $('#msg2').html('<p class="alert alert-danger msg1">'+data.response+'</p>')
                    //alert(data.response);
                     setInterval(function(){$('.msg1').fadeOut(3000); }, 3000);
                    // $('#msg').fadeOut(300, function(){ $(this).empty();});
                }
                 
                }
              });
       
		
		
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
            $('#p').hide();
            $('#op').show();
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
	
	function dorechargeorder()
	{
	 var brand=$('#brand').val();
		var rmn=$('#rmn').val();
		var amt=$('#amt').val();
    if($('#walllet_bal').is(':checked')){
     wallet=true;
}
else
{
     wallet=false;
}

		
           
          $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
            });
             

              $.ajax({
               type:'POST',
              
               url:'{{url("/placemobilerechargeorder")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",
                      brand: brand,
                      rmn:rmn,
                      amt:amt,
                      wallet:wallet
                     },

               success:function(data) { 
                  if (data!=0) {
                    location.replace('/domobilerechargenow/'+data);
                  }
                  else

                  {
                    alert('Failed');
                  }
                   
                 
                }
              });
		
	}
</script>
		
@endsection