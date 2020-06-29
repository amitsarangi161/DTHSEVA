@extends('layouts.app')
@section('content')
<style type="text/css">
	
.order
{
	margin: 10px 0px;
	background: #fff;
	padding: 15px;
	box-shadow: 1px 0px 20px -7px;
	border-top: 5px solid #de5e00;
}
</style>

<table class="table">
	<form action="/orders/productorders" method="get">
	<tr>
		<td><strong>PAYMENT STATUS</strong></td>
		<td>
			<select name="paymentstatus" required="" class="form-control">
				<option value="ALL" {{(Request::get('paymentstatus')=='ALL')?'selected':''}}>ALL</option>
				<option value="PENDING" {{(Request::get('paymentstatus')=='PENDING')?'selected':''}}>PENDING</option>
				<option value="PAID" {{(Request::get('paymentstatus')=='PAID')?'selected':''}}>PAID</option>
				<option value="FAILED" {{(Request::get('paymentstatus')=='FAILED')?'selected':''}}>FAILED</option>	
			</select>
		</td>
		<td><strong>ORDER STATUS</strong></td>
		<td>
			<select name="orderstatus" required="" class="form-control">
				<option value="ALL" {{(Request('orderstatus')=='ALL')?'selected':''}}>ALL</option>
				@foreach($orderstatuses as $orderstatus)
				<option value="{{$orderstatus->orderstatus}}" {{(Request('orderstatus')==$orderstatus->orderstatus)?'selected':''}}>{{$orderstatus->orderstatus}}</option>
				@endforeach
			</select>
		</td>
		<td>
			<input type="text" name="search" placeholder="Enter a Search Keyword" value="{{Request::get('search')}}" class="form-control">
		</td>
		<td><button type="submit" class="btn btn-success">Filter</button></td>
		@if(Request::has('paymentstatus'))
        <td><a href="/orders/productorders" class="btn btn-danger">Clear</a></td>
		@endif

	</tr>
	</form>
</table>

<div style="overflow-x:auto;">
<table class="table table-striped table-bordered table-hover table-responsive table-compact">
	<thead class="bg-navy">
		<tr>
			<th>ID</th>
			<th>PRODUCT NAME</th>
			<th>ORDERED BY</th>
			<th>DATE</th>
			<th>PRICE</th>
			<th>AMOUNT PAID</th>
			<th>DISCOUNT</th>
			<th>PROMOCODE</th>
			<th>BALANCE</th>
			<th>ORDER STATUS</th>
			<th>PAYMENT STATUS</th>
			<th>DELIVERY ADDRESS</th>
			<th>ACTION</th>

		</tr>
	</thead>
	<tbody>
		@foreach($orders as $order)

@php
$bgc="#fff";
if($order->orderstatus=="ORDERED"){$bgc="#d4e6f0";}
if($order->orderstatus=="CANCELLED"){$bgc="#ffc6b4";}
if($order->orderstatus=="DELIVERED"){$bgc="#b8e0d2";}
if($order->orderstatus=="DISPATCHED"){$bgc="#bad9de";}
if($order->orderstatus=="CANCEL FROM SELLER"){$bgc="#f3cda9";}

@endphp



		<tr style="background: {{$bgc}}">
			<td>{{$order->id}}</td>
			<td>{{$order->productname}}</td>
			<td>{{$order->orderby}}</td>
			<td>{{strftime("%d %b %Y",strtotime($order->created_at)) }}</td>
			<td>{{$order->productprice}}</td>
			<td>{{$order->amountpaid}}</td>
			<td>{{$order->discount}}</td>
			<td>{{$order->couponcode}}</td>
			<td>{{((0+$order->productprice)-(0+$order->amountpaid))-(0+$order->discount)}}</td>
			<td>{{$order->orderstatus}}</td>
			<td>{{$order->paymentstatus}}</td>
			<td>{{$order->address}}<br>{{$order->city}}<br>{{$order->state}}<br>{{$order->pincode}}</td>
			
			<td><a href="/orders/orderdetails/{{$order->id}}" class="btn btn-primary">ACTION</a></td>

		</tr>
		@endforeach
	</tbody>
</table>

</div>
{{$orders->appends($data)->links()}}

 <div class="modal fade" id="myModal" role="dialog">

      
         <div class="container">
         <div class="row ">
           <div class="col-md-6 col-md-offset-3 ">
               <div class="order">
     <form class="register-form outer-top-xs" role="form" action="/userlogin" method="post">

		{{csrf_field()}}
               	<h3>Login to your account first</h3>
    <div  id="msg1">        	
    
    </div>
    <div class="form-group">
        <label class="info-title" for="exampleInputEmail2">Username <span>*</span></label>
        <input type="text" id="mob" class="form-control unicase-form-control text-input" value="" >
      </div>

    <div class="form-group">
        <label class="info-title" for="exampleInputEmail2">Password <span>*</span></label>
        <input type="password" id="pass" class="form-control unicase-form-control text-input" value="" >
      </div>

    <div class="form-group" style="display:none;">
        <label class="info-title" for="exampleInputEmail2">OTP <span>*</span></label>
        <input type="password" id="otp" class="form-control unicase-form-control text-input" value="" >
      </div>
      <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" onclick="sendOtp()"><span>Login with OTP</span></button>
  </div>
					   
					   
					 
    <div class="form-group">
    <button class="btn btn-success" type="button" onclick="loginnow()">Login</button>
    <button class="btn btn-danger" type="button" data-dismiss="modal">CANCEL</button>
     <a href="#" class="forgot-password">Forgot your Password?</a>
       </div>
   </form>
           </div>
         </div>

         </div>
     
      </div>
      
      
  </div>

<script type="text/javascript">
	function openModal(oid) {
	     	
	      $('#myModal').modal('show');
	}

</script>
@endsection