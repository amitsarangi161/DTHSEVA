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
			<td><strong>BRAND NAME</strong></td>
			<td>{{$rechargeorder->operatorname}}</td>
			<td>TRN NO</td>
            <td>{{$rechargeorder->trnid}}</td>
		</tr>
    <tr>
      <td><strong>CIRCLE</strong></td>
      <td>{{$rechargeorder->circle}}</td>
      <td>RECHARGE TYPE</td>
      <td>{{$rechargeorder->recharge_type}}</td>
    </tr>
		<tr>
			<td><strong>RECHARGE MOB NO</strong></td>
			<td>{{$rechargeorder->mobileno}}</td>
			<td>RECHARGE AMOUNT</td>
           <td>{{$rechargeorder->amount}}</td>
		</tr>
    <tr>
      <td><strong>REGISTERED MOB NO</strong></td>
      <td>{{$rechargeorder->mobile}}</td>
      <td></td>
      <td></td>
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
			<td><strong>RECHARGE API</strong></td>
			<td>{{$rechargeorder->api_url}}</td>
			<td>RES MSG RECARGE</td>
			<td>{{$rechargeorder->recharge_res_msg}}</td>
		</tr>
      <tr>
      <td><strong>WALLET USED</strong></td>
      <td>{{$rechargeorder->use_wallet}}</td>
      <td>WALLET DEDUCTION</td>
      <td>{{$rechargeorder->wallet_deduction}}</td>
    </tr>
      <tr>
      <td>AMOUNT TO PAY</td>
      <td>{{$rechargeorder->amttopay}}</td>
      <td><strong>WALLET CASHBACK</strong></td>
      <td>{{$walletbalgain}}</td>

    </tr>
     <tr>
      <td>Time</td>
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

<table class="table table-responsive table-hover table-bordered table-striped">
  <tr class="bg-black">
    <td class="text-center">ONE PAY RESPONSE</td>
  </tr>
</table>

<div class="well">
  <div class="table-responsive">
  <table class="table table-responsive table-hover table-bordered table-striped">
     <thead>
      <tr>
        <th>ID</th>
        <th>TNO</th>
         <th>ST</th>
         <th>STMSG</th>
         <th>TID</th>
         <th>OPRTID</th>
         <th>Mobile</th>
         <th>Amount</th>
         <th>PRB</th>
         <th>POB</th>
         <th>DP</th>
         <th>DR</th>
        <th>CREATED_AT</th>
      </tr>
     </thead>
     <tbody>
      @foreach($onepayresponses as $onepayresponse)
      <tr>
         <td>{{$onepayresponse->id}}</td>
         <td>{{$onepayresponse->tno}}</td>
         <td>{{$onepayresponse->st}}</td>
         <td>{{$onepayresponse->stmsg}}</td>
         <td>{{$onepayresponse->tid}}</td>
         <td>{{$onepayresponse->oprtid}}</td>
         <td>{{$onepayresponse->mobile}}</td>
         <td>{{$onepayresponse->amount}}</td>
         <td>{{$onepayresponse->prb}}</td>
         <td>{{$onepayresponse->pob}}</td>
         <td>{{$onepayresponse->dp}}</td>
         <td>{{$onepayresponse->dr}}</td>
         <td>{{$onepayresponse->created_at}}</td>
      </tr>
      @endforeach
     </tbody>
    
  </table>
   
       
  
      

  
</div>
</div>

      
			
			


@endsection