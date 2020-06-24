  @extends('layouts.frontend')
  @section('content')

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
</style>

<div class="body-content">
  <div class="container" style="width: 90%">
    <div class="row">
    
        
<div class="myaccount">

<div class="col-md-3 sidebar">
<div class="fadeInUp" style='background-image: url("/images/myac-bg.jpg");'>
  <img style="width: 60%; padding: 10px;" class="img img-responsive " src="{{asset('images/avatar.png')}}">
  
</div>

<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
  <h3 class="section-title text-center">Welcome Back !! <br>{{Session::get('userid')['name']}}</h3>
  <h3 class="section-title text-center">{{Session::get('userid')['email']}} <a href="#"><span style="font-size: 9px;background: #de5e00;padding: 5px 15px;border-radius: 18px;color: #fff;float: right;" onclick='updateprofile()'>Change ?</span></a></h3>
  <h3 class="section-title text-center" >{{Session::get('userid')['mobile']}}</h3>
  <h3 class="section-title text-center" ><a href="#"><span style="background: #de5e00;padding: 5px 10px;border-radius: 18px;color: #fff;" onclick='updatepass()'>Change Password?</span></a></h3>


  <h5 class="text-center">Wallet Balance Rs.{{$walletbal}}</h5>
  
</div>
  
          </div>



        <div class="col-md-9">


          
     <!--      <div class="row description-header"><span>MY ORDERS</span></div>
          @if(Session::has('thankmsg'))
                   <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('thankmsg') }}</p>
                   @endif
          
@foreach($orders as $order)
<div class="row order">
          <div class="pname">ORDER ID: #{{$order->id}}
        <a href="/products/{{$order->productname}}/{{$order->productid}}" target="_blank"><b> <span class="productname">{{$order->productname}}</span></b></a>
        
        @if($order->orderstatus!="CANCELLED" && $order->orderstatus !="CANCELLED BY SELLER")
          <span style="float: right;color: #fff;background: #0f8060;padding: 4px;border-radius: 5px;">{{$order->orderstatus}}</span>
         @else
           <span style="float: right;color: #fff;background: #ed5353;padding: 4px;border-radius: 5px;" >{{$order->orderstatus}}</span>
         @endif
         
          @if($order->paymentstatus=="PENDING") 
          @if( $order->orderstatus!="CANCELLED" && $order->orderstatus !="CANCELLED BY SELLER")
          <a href="/paymentgateway/{{base64_encode($order->id)}}" style=" text-transform: capitalize !important;margin: 0px 14px; float: right !important;color: #fff !important;background: #0e5480  !important;padding: 4px !important;border-radius: 5px !important;">Payment Pending !! Retry ?</a>
        
         @endif
         @endif
          </div>
          <div class="col-sm-3 col-xs-12" style="float: left;">
          <img style="width: 60%; padding: 10px;" class="img img-responsive " src="{{ asset('/img/productimage/'.$order->image1 )}}">
          </div>
          <div class="col-sm-6 col-xs-12"  style="float: left;">
          <b style='color:#ef7b19'>  Order placed:</b><strong>{{$order->updated_at}}</strong><br>
          <strong>{{$order->name}}</strong>

             <p>{{$order->address}}</p>
              <p>{{$order->mobile}}</p>
              <p>{{$order->city}}</p>
              <p>{{$order->state}}</p>
              <p>{{$order->pincode}}</p>
                     
          </div>
          <div class="col-sm-3 col-xs-12" style="float: right;">
                         @php
                             $reviewcount=App\review::where('customerid',Session::get('userid')['uid'])
                             ->where('orderid',$order->id)
                             ->where('productid',$order->productid)
                             ->count();
                          @endphp

                         @if($order->orderstatus !="CANCELLED" && $order->orderstatus !="CANCELLED BY SELLER")

                             @if($order->orderstatus !="DISPATCHED" && $order->orderstatus !="DELIVERED"  )
                             <button type="button"  onclick="cancelOrder('{{$order->id}}','{{$order->productid}}','{{$order->productname}}');"  class="btn btn-danger btn-flat form-control orderbtn"> CANCEL ORDER</button>
                              
                            


                             @elseif($order->orderstatus =="DELIVERED")
                               <button class="btn btn-primary btn-flat form-control orderbtn"> INVOICE</button> 
                              
                                     @if($reviewcount==0)
                                <button type="button" onclick="review('{{$order->id}}','{{$order->productid}}');" class="btn btn-info btn-flat form-control orderbtn"> Review</button>
                                      @else
                                    <button class="btn btn-primary btn-flat form-control orderbtn" disabled=""> Already Reviewed</button>

                                      @endif

                               @else

                              @endif



                         @endif
                          
                        
                          
                          
                          
           
          

                        
                          

                          

                          
          
          
          
          
          </div>
</div>


@endforeach -->


<div class="row description-header"><span>MY RECHARGES</span></div>
          
          
@foreach($rechrgeorders as $rechrgeorder)
<div class="row order">
          <div class="pname">
       <b> <span class="productname">{{$rechrgeorder->brandname}}</span></b>
          <span style="float: right;">{{$rechrgeorder->orderstatus}}

               @if($rechrgeorder->orderstatus=="FAILED")
            <i title="{{$rechrgeorder->reason}}" class="fa fa-exclamation-circle" aria-hidden="true"></i>
                @endif
     
          </span>
          </div>
          <div class="col-sm-3 col-xs-12" style="float: left;text-align: center;">
           <img style="width: 60%; padding: 10px;" class="img img-responsive " src="{{ asset('/img/brandlogo/'.$rechrgeorder->brandlogo )}}">
           <br>
           <br>
           <strong>RS.{{$rechrgeorder->amount}}</strong>
          </div>
          <div class="col-sm-6 col-xs-12"  style="float: left;">
          
              <p>VC NO-{{$rechrgeorder->cardno}}</p>

              <p>MOBILE NO-{{$rechrgeorder->mobileno}}</p>
              

          </div>
          <div class="col-sm-3 col-xs-12" style="float: right;">
         
                      

                        <button type="button" onclick="opencontactus('{{$rechrgeorder->id}}');" class="btn btn-primary btn-flat form-control orderbtn">contact us</button>
                          

                         

                   
          
          
          
          
          
          </div>
</div>


@endforeach

<div class="row description-header"><span>MOBILE RECHARGES</span></div>
          
          
@foreach($mobilerechrgeorders as $rechrgeorder)
<div class="row order">
          <div class="pname">
       <b> <span class="productname">{{$rechrgeorder->operatorname}}</span></b>
          <span style="float: right;">{{$rechrgeorder->orderstatus}}

               @if($rechrgeorder->orderstatus=="FAILED")
            <i title="{{$rechrgeorder->reason}}" class="fa fa-exclamation-circle" aria-hidden="true"></i>
                @endif
     
          </span>
          </div>
          <div class="col-sm-3 col-xs-12" style="float: left;text-align: center;">
           <img style="width: 60%; padding: 10px;" class="img img-responsive " src="{{ asset('/img/brandlogo/'.$rechrgeorder->brandlogo )}}">
           <br>
           <br>
           <strong>RS.{{$rechrgeorder->amount}}</strong>
          </div>
          <div class="col-sm-6 col-xs-12"  style="float: left;">
          
             

              <p>MOBILE NO-{{$rechrgeorder->mobileno}}</p>
              

          </div>
          <div class="col-sm-3 col-xs-12" style="float: right;">
         
                      

                        <button type="button" onclick="opencontactus('{{$rechrgeorder->id}}');" class="btn btn-primary btn-flat form-control orderbtn">contact us</button>
                          

                         

                   
          
          
          
          
          
          </div>
</div>


@endforeach

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
          Productname<input type="text" name="productname" id="productname"><br>
          OrderID<input type="text" name="orderid" id="orderid"><br>
                  <input type="text" name="productid" id="productid"><br>
         Select a Reason<select name="reason">
                           <option value="Late Delivery">Late Delivery</option>
                           <option value="Change my mind">Change my mind</option>
                           <option value="Worst Product">Worst Product</option>
                         </select><br>
                  Description<textarea name="description">
          
                    </textarea>
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
      

        <div class="form-group reason">
        <label class="info-title" for="exampleInputEmail2">Description<span>*</span></label>
       <textarea name="description" class="form-control">
        
       </textarea>
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
    alert(id+pid+pname);
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
  //  alert("Hello");
  }
   

   function opencontactus(roid)
   {
      $('#contactUs').modal('show');
      $("#roid").val(roid);

   }
</script>
@endsection