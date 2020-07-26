@extends('layouts.app')
@section('content')
<table class="table table-responsive table-hover table-bordered table-striped">
	<tr class="bg-blue">
		<td class="text-center">MOBILE RECHARGE DETAILS</td>
	</tr>
</table>
<div class="well">
  <div class="table-responsive">
	<table class="table">
		<tr>
			<td><strong>ORDER ID</strong></td>
			<td>#{{$rechargeorder->uniqueoid}}</td>
			<td><strong>Customer Name</strong></td>
			<td>{{$rechargeorder->name}}</td>
		</tr>
		
		<tr>
			<td><strong>RECHARGE STATUS</strong></td>
			@if($rechargeorder->orderstatus=='PENDING')
			<td><span class="label label-primary">{{$rechargeorder->orderstatus}}</span></td>
			@elseif($rechargeorder->orderstatus=='SUCCESS')
              <td><span class="label label-success">{{$rechargeorder->orderstatus}}</span></td>
             @else
              <td><span class="label label-danger">{{$rechargeorder->orderstatus}}</span></td>
			@endif
			<td><strong>PAYMENT STATUS</strong></td>
				 @if($rechargeorder->paymentstatus=='PENDING')
			<td><span class="label label-primary">{{$rechargeorder->paymentstatus}}</span></td>
			@elseif($rechargeorder->paymentstatus=='PAID')
              <td><span class="label label-success">{{$rechargeorder->paymentstatus}}</span></td>
             @else
              <td><span class="label label-danger">{{$rechargeorder->paymentstatus}}</span></td>
			@endif

		</tr>
		
    <tr>
      <td><strong>AMOUNT TO PAY</strong></td>
      <td>{{$rechargeorder->amounttopay}}</td>s
      <td><strong>Time</strong></td>
      <td>{{$rechargeorder->created_at}}</td>
     

    </tr>
		
	</table>
	</div>
</div>
<table class="table table-responsive table-hover table-bordered table-striped">
	<tr class="bg-black">
		<td class="text-center">PAYTM PAYMENT DETAILS</td>
	</tr>
</table>

<div class="well">
	<div class="table-responsive">
  <table class="table table-responsive table-hover table-bordered table-striped">
  	 <thead>
  	 	<tr>
  	 		<th>ID</th>
  	 		<th>ORDERID</th>
  	 		<th>MID</th>
  	 		<th>TXNID</th>
  	 		<th>TXNAMOUNT</th>
  	 		<th>PAYMENTMODE</th>
  	 		<th>CURRENCY</th>
  	 		<th>TXNDATE</th>
  	 		<th>STATUS</th>
  	 		<th>RESPCODE</th>
  	 		<th>RESPMSG</th>
  	 		<th>GATEWAYNAME</th>
  	 		<th>BANKTXNID</th>
  	 		<th>CHECKSUMHASH</th>
  	 		<th>CREATED_AT</th>
  	 	</tr>
  	 </thead>
  	 <tbody>
  	 	@foreach($paytmstatus as $paytmrecharge)
  	 	<tr>
  	 	<td>{{$paytmrecharge->id}}</td>
  	 	<td>{{$paytmrecharge->orderid}}</td>
        <td>{{$paytmrecharge->mid}}</td>
        <td>{{$paytmrecharge->txnid}}</td>
        <td>{{$paytmrecharge->txnamount}}</td>
        <td>{{$paytmrecharge->paymentmode}}</td>
        <td>{{$paytmrecharge->currency}}</td>
        <td>{{$paytmrecharge->txndate}}</td>
        <td>{{$paytmrecharge->status}}</td>
        <td>{{$paytmrecharge->respcode}}</td>
        <td>{{$paytmrecharge->respmsg}}</td>
        <td>{{$paytmrecharge->gateayname}}</td>
        <td>{{$paytmrecharge->banktxnid}}</td>
        <td>{{$paytmrecharge->checksumhash}}</td>
        <td>{{$paytmrecharge->created_at}}</td>
  	 	</tr>
  	 	@endforeach
  	 </tbody>
  	
  </table>
   
       
  
      

	
</div>
</div>




      
			
			


@endsection