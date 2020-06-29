@extends('layouts.app')
@section('content')

<style type="text/css">
    .b {
    white-space: nowrap; 
    width: 120px; 
    overflow: hidden;
    text-overflow: ellipsis; 
   
}
</style>
<table class="table table-responsive table-hover table-bordered table-striped">
	<tr class="bg-blue">
		<td class="text-center">Paytm Payment Reports</td>
	</tr>
</table>

 <table class="table">
  <form action="/reports/paymentreport" method="get">
  <tr>
    <td><strong>Enter search keyword</strong></td>

    <td>
      <input type="text" name="search" placeholder="Enter a Search Keyword" value="{{Request::get('search')}}" class="form-control" required="">
    </td>
    <td><button type="submit" class="btn btn-success">Filter</button></td>
    @if(Request::has('search'))
        <td><a href="/reports/paymentreport" class="btn btn-danger">Clear</a></td>
    @endif

  </tr>
  </form>
</table>

	<div class="table-responsive">
  <table class="table table-responsive table-hover table-bordered table-striped">
  	 <thead>
  	 	<tr class="bg-navy">
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
        <td>{{$paytmrecharge->created_at}}</td>
  	 	</tr>
  	 	@endforeach
  	 </tbody>
  	
  </table>
   
	
</div>
{{$paytmstatus->appends($data)->links()}}


      
			
			


@endsection