  @extends('layouts.app')
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

    
<div class="container">     
<div class="myaccount">
<div class="col-md-10 col-md-offset-1">
          
<div class="row order">
          <div class="pname">
        <a href="/products/{{$order->productname}}/{{$order->productid}}" target="_blank"><b> <span class="productname">ORDER ID # {{$order->id}}</span></b></a>
          <span style="float: right;">
          @if($order->orderstatus !="CANCELLED" && $order->orderstatus !="CANCELLED BY SELLER")

          @if($order->orderstatus !="DISPATCHED" && $order->orderstatus !="DELIVERED"  )
            <button onclick="cancel('{{$order->id}}')" class="btn btn-danger">CANCEL</button>
            <button onclick="dispatch('{{$order->id}}')" class="btn btn-warning">DISPATCH</button>

          @endif
          
            
        @if($order->orderstatus !="DELIVERED" && $order->orderstatus !="ORDERED"  )

            <button onclick="deliver('{{$order->id}}')" class="btn btn-success">DELIVER</button>

            @endif



          @endif
          </span>
          </div>
<div class="row">
          <div class="col-sm-6 col-xs-12"  style="float: left;">
          <h4>DELIVERY DETAILS</h4>
          <strong>{{$order->name}}</strong>

             <p>{{$order->address}}</p>
              <p>{{$order->mobile}}</p>
              <p>{{$order->city}}</p>
              <p>{{$order->state}}</p>
              <p>{{$order->pincode}}</p>

          </div>  

          <div class="col-sm-6 col-xs-12"  style="float: left;">
          <h4>ORDER DETAILS</h4>
          <strong>Order Date#{{$order->created_at}}</strong>

             <p>Last Update # {{$order->updated_at}}</p>
              <p>Order Status: {{$order->orderstatus}}</p>
              <p>Payment Status:{{$order->paymentstatus}}</p>
             

          </div>
          </div>

        <hr class="hr-danger" /><br>

<div class="row">
                    
          <div class="col-sm-6 col-xs-12"  style="float: left;">
          <h4>PRODUCT DETAILS</h4>
          <strong>Product Name:   {{$productdetails->name}}</strong>

             <p>Description:{{$productdetails->shortdescription}}</p>
              

          </div>  

          <div class="col-sm-6 col-xs-12"  style="float: left;">
          <h4>PAYMENT DETAILS</h4>
          <strong>Product Cost:   {{$order->productprice}}</strong><br>
          <strong>Amount Paid :   {{$order->amountpaid}}</strong><br>
          <strong>Balance     :   {{$order->productprice-$order->amountpaid}}</strong>

              

          </div>  
          </div>
          
          </div>

</div>  





         

</div>







 <div class="modal fade" id="cancel" role="dialog">
<form class="form-group" action="{{url('backendupdatestatus')}}" method="post">
      {{csrf_field()}}
         <div class="container">
         <div class="row ">
           <div class="col-md-6 col-md-offset-3 ">
               <div class="order">
                <span id="msg1"></span>

 <input type="hidden" id="oid" name="oid">
          <input type="hidden" id="typ" name="typ">

          <div class="form-group dispatch">
         
        <textarea class="form-control unicase-form-control text-input" name="dispatchdetails" value=""></textarea>
    </div>
    <div class="form-group cancel">
        <textarea class="form-control unicase-form-control text-input" name="cancelreason"value=""></textarea>
    </div>
   
    <div class="form-group">
    <button class="btn btn-success" onclick="changePassword();" type="submit">UPDATE</button>
    <button class="btn btn-danger" type="button" data-dismiss="modal">CANCEL</button>
       </div>
           </div>
         </div>
         </div>
     
      </div>
      
     </form> 
  </div>

</div>


<script type="text/javascript">


  
  
  function cancel(id) {
    $('#oid').val(id);
    $('#typ').val("CANCELLED BY SELLER");
    
    $('.dispatch').hide();
    $('.cancel').show();
    $('#msg1').html("<h3>Please put cancellation reason</h3>");
$('#cancel').modal('show');
    
  }  


  function dispatch(id) {

    $('#oid').val(id);
    $('#typ').val("DISPATCHED");
     $('.dispatch').show();
    $('.cancel').hide();
    $('#msg1').html("<h3>Please put dispatch details</h3>");


    $('#cancel').modal('show');
    
  }  



  function deliver(id) {

    $('#oid').val(id);
    $('#typ').val("DELIVERED");
    $('.dispatch').hide();
    $('.cancel').hide();
    $('#msg1').html("<h3>Are you conform to update the status to DELIVERED ?</h3>")


    $('#cancel').modal('show');
    
  }


</script>
@endsection