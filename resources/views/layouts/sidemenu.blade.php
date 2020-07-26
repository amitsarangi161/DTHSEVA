

<style type="text/css">
	.myaccount{
		margin: 30px 0px;
	}
	.orderbtn{
		margin: 10px 0px;
	}
.pname{
background: #e9d6c1;
margin: -15px -15px 16px -15px;
padding: 17px;
text-transform: uppercase;
font-weight: 800;


	}


	.order{margin: 10px 0px;
background: #fff;
padding: 15px;
box-shadow: 1px 0px 20px -7px;
border-top: 5px solid #de5e00;
}
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #ff9000;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #ff9000;
  background-color: #f6f9fb;
  border-left: 2px solid #ff9000;
  margin-left: -2px;
}
.iconx {
   font-weight: bold;
   font-size: 16px!important;
}

</style>

<div class="body-content">
	<div class="container" style="width: 90%">
		<div class="row">
		
				
<div class="myaccount">

<div class="col-md-3 col-lg-3 col-sm-3 sidebar">
  <div class="fadeInUp" style="background-color: #e1e1e1;">
  	<img style="width: 82%; padding: 10px;" class="img img-responsive " src="{{asset('images/dth.png')}}">
  	
  </div>

  <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
  	<h3 class="section-title text-center">Welcome Back !! <br>{{Session::get('userid')['name']}}</h3>
    <div class="profile-usermenu">
          <ul class="nav">
            <li class="{{ Request::is('myaccount') ? 'active' : '' }}">
              <a href="/myaccount">
              <i class="fa fa-home iconx"></i>
              Home </a>
            </li>
            <li class="{{ Request::is('myaccount/myproductorders') ? 'active' : '' }}">
              <a href="/myaccount/myproductorders">
             <i class="fa fa-shopping-cart iconx"></i>
              Product Orders </a>
            </li>
            <li class="{{ Request::is('myaccount/mymobilerecharges') ? 'active' : '' }}">
              <a href="/myaccount/mymobilerecharges">
             <i class="fa fa-mobile iconx" style="font-size: 18px!important;"></i>
              Mobile Recharges</a>
            </li>
            <li class="{{ Request::is('myaccount/mydthrecharges') ? 'active' : '' }}">
              <a href="/myaccount/mydthrecharges">
              <i class="fa fa-tv iconx"></i>
              DTH Recharges </a>
            </li>
            <li class="{{ Request::is('myaccount/myprofile') ? 'active' : '' }}">
              <a href="/myaccount/myprofile">
             <i class="fa fa-user iconx"></i>
              My Account</a>
            </li>
            <li class="{{ Request::is('myaccount/mywallet') ? 'active' : '' }}">
              <a href="/myaccount/mywallet">
              <i class="fa fa-credit-card iconx"></i>
              My Wallet (INR. {{$walletbal}})</a>
            </li>
            <li>
              <a href="/userLogout" onclick="return confirm('Do You want to Log out')">
              <i class="fa fa-sign-out"></i>
              Log Out </a>
            </li>
          </ul>
    </div>
  	<!-- <h5 class="text-center">Wallet Balance Rs.{{$walletbal}}</h5> -->
  </div>
	
</div>



	<div class="col-md-9 col-lg-9 col-sm-9">
    @yield('sidemenucontent')

  </div>

</div>


</div>
</div>
</div>



 <div class="modal fade" id="updateprofile" role="dialog">

       <form action="/updateprofile/{{Session::get('userid')['uid']}}" method="POST">
       	{{csrf_field()}}
         <div class="container">
         <div class="row ">
           <div class="col-md-6 col-md-offset-3 ">
               <div class="order">
          <div class="form-group">
        <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
        <input type="text" class="form-control unicase-form-control text-input" name="name" value="{{Session::get('userid')['name']}}">
    </div>
    <div class="form-group">
        <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
        <input type="email" name="email" class="form-control unicase-form-control text-input" value="{{Session::get('userid')['email']}}" >
      </div>
    <div class="form-group">
    <button class="btn btn-success" type="submit">UPDATE</button>
    <button class="btn btn-danger" type="button" data-dismiss="modal">CANCEL</button>
       </div>
           </div>
         </div>
     
      </div></div>
       </form>
      
  </div>


 <div class="modal fade" id="updatepass" role="dialog">

      
         <div class="container">
         <div class="row ">
           <div class="col-md-6 col-md-offset-3 ">
               <div class="order">
               	<span id="msg1"></span>
          <div class="form-group">
        <label class="info-title" for="exampleInputEmail1">Old Password <span>*</span></label>
        <input type="password" class="form-control unicase-form-control text-input" id="oldpassword" value="">
    </div>
    <div class="form-group">
        <label class="info-title" for="exampleInputEmail2">New Password <span>*</span></label>
        <input type="password" id="newpassword" class="form-control unicase-form-control text-input" value="" >
      </div>
    <div class="form-group">
        <label class="info-title" for="exampleInputEmail2">Confirm Password <span>*</span></label>
        <input type="password" id="confirmpassword" class="form-control unicase-form-control text-input" value="" >
      </div>
    <div class="form-group">
    <button class="btn btn-success" onclick="changePassword();" type="submit">UPDATE</button>
    <button class="btn btn-danger" type="button" data-dismiss="modal">CANCEL</button>
       </div>
           </div>
         </div>
         </div>
     
      </div>
      
      
  </div>



 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cancel Order</h4>
        </div>
        <div class="modal-body">
        	<form action="/cancelOrder" method="POST">
        		{{csrf_field()}}
          Productname<input type="text" class="form-control" name="productname" id="productname" readonly=""><br>
          OrderID<input type="hidden" name="orderid" id="orderid"><br>
                  <input type="hidden" name="productid" id="productid"><br>
         Select a Reason<select name="reason" class="form-control">
            	             <option value="Late Delivery">Late Delivery</option>
            	             <option value="Change my mind">Change my mind</option>
            	             <option value="Worst Product">Worst Product</option>
                         </select><br>
                  Description 
                  <textarea name="description" class="form-control"></textarea>
              <button type="submit" class="btn btn-primary">Cancel Order</button>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new review</h4>
      </div>
      <div class="modal-body">
        <div role="tabpanel" class="tab-pane" id="Tab5">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <td></td>
                          <td class="text-center">1 star</td>
                          <td class="text-center">2 star</td>
                          <td class="text-center">3 star</td>
                          <td class="text-center">4 star</td>
                          <td class="text-center">5 star</td>
                        </tr>
                      </thead>
                      <form  action="/addReview" method="POST" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
            <input type="hidden" name="customerid1" value="{{Session::get('userid')['uid']}}">
            <input type="hidden" id="productid1" name="productid" value="">
            <input type="hidden" id="orderid1" name="orderid" value="">
          
                      <tbody>
                        <tr>
                          <td><strong>Price</strong></td>
                          <td class="text-center">
                            <label class="radio">
                              <input  type="radio" name="price" value="1"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                          <td class="text-center">
                            <label class="radio">
                              <input type="radio" name="price" value="2"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                          <td class="text-center">
                            <label class="radio">
                              <input  type="radio" name="price" value="3"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                          <td class="text-center">
                            <label class="radio">
                              <input  type="radio" name="price" value="4"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                          <td class="text-center">
                            <label class="radio">
                              <input  type="radio" name="price" value="5"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <td><strong>Value</strong></td>
                          <td class="text-center">
                            <label class="radio">
                              <input  type="radio" name="value" value="1"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                          <td class="text-center">
                            <label class="radio">
                            <input  type="radio" name="value" value="2"><span class="outer"><span class="inner"></span></span>                            </label>
                          </td>
                          <td class="text-center">
                            <label class="radio">
                              <input  type="radio" name="value" value="3"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                          <td class="text-center">
                            <label class="radio">
                             <input  type="radio" name="value" value="4"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                          <td class="text-center">
                            <label class="radio">
                              <input  type="radio" name="value" value="5"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <td><strong>Quality</strong></td>
                          <td class="text-center">
                            <label class="radio">
                              <input type="radio" name="quality" value="1"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                          <td class="text-center">
                            <label class="radio">
                               <input type="radio" name="quality" value="2"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                          <td class="text-center">
                            <label class="radio">
                              <input type="radio" name="quality" value="3"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                          <td class="text-center">
                            <label class="radio">
                              <input type="radio" name="quality" value="4"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                          <td class="text-center">
                            <label class="radio">
                              <input type="radio" name="quality" value="5"><span class="outer"><span class="inner"></span></span>
                            </label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                
                 
                    <label>Review<span class="required">*</span></label>
                    <textarea name="review" class="form-control input-lg"></textarea>
                    <div>
                      <button type="submit"  class="btn btn-lg btn-info">Submit Review</button>
                    </div>
                    </div>
              </div>
          
        </div>
                  </form>
               





    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>


 <div class="modal fade" id="contactUs" role="dialog">

      
         <div class="container">
         <div class="row ">
           <div class="col-md-6 col-md-offset-3 ">
               <div class="order">
     <form class="register-form outer-top-xs" role="form" action="/rechargecontactus" method="post">

    {{csrf_field()}}
                <h3>FEEDBACK</h3>
       <input type="hidden" name="roid" id="roid">
       <input type="hidden" name="type" id="rtype">
      

        <div class="form-group reason">
        <label class="info-title" for="exampleInputEmail2">Description<span>*</span></label>
       <textarea name="description" class="form-control"></textarea>
      </div>

 
    
             
             
           
    <div class="form-group">
    <button class="btn btn-success" type="submit"><span>Send</span></button>
    <button class="btn btn-danger" type="button" data-dismiss="modal">CANCEL</button>
    
       </div>
   </form>
           </div>
         </div>

         </div>
     
      </div>
      
      
  </div>







<script type="text/javascript">


	function changePassword()
	{

        var oldpassword=$("#oldpassword").val();
        var newpassword=$("#newpassword").val();
        var confirmpassword=$("#confirmpassword").val();
       

         $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
             });

           $.ajax({
               type:'POST',
              
               url:'{{url("/changePassword")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",
                      oldpassword: oldpassword,
                      newpassword: newpassword,
                      confirmpassword: confirmpassword
                     },

               success:function(data) { 
               
                   $("#msg1").empty();
                  if(data=='1'){
                     $("#msg1").html("Successfully Changed");
                     setInterval(function(){ $('#updatepass').modal('hide'); 

                       $("#oldpassword").val("");
                     $("#newpassword").val("");
                   $("#confirmpassword").val("");

                      }, 3000);
                  }
                  else
                  {
                  	 $("#msg1").html(data);
                  }
                 
                }
              });
	}
	
	function cancelOrder(id,pid,pname) {
		//alert(id+pid+pname);
		$("#productname").val(pname);
		$("#productid").val(pid);
		$("#orderid").val(id);
		$('#myModal').modal('show');
		
	}function review(id,pid) {
		$("#orderid1").val(id);
		$("#productid1").val(pid);

		$('#myModal1').modal('show');
		
	}

  function updateprofile()
  {
    $('#updateprofile').modal('show');
  //  alert("Hello");
  }
	function updatepass()
	{
		$('#updatepass').modal('show');
	//	alert("Hello");
	}
   

   function opencontactus(roid,type)
   {
      $('#contactUs').modal('show');
      $("#roid").val(roid);
      $("#rtype").val(type);

   }
</script>
