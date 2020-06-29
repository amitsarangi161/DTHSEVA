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
	<form action="/recharge/rechargeorders" method="get">
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
		<td><strong>RECHARGE STATUS</strong></td>
		<td>
			<select name="orderstatus" required="" class="form-control">
				<option value="ALL" {{(Request('orderstatus')=='ALL')?'selected':''}}>ALL</option>
				<option value="PENDING" {{(Request('orderstatus')=='PENDING')?'selected':''}}>PENDING</option>
				<option value="SUCCESS" {{(Request('orderstatus')=='SUCCESS')?'selected':''}}>SUCCESS</option>
				<option value="FAILED" {{(Request('orderstatus')=='FAILED')?'selected':''}}>FAILED</option>	
			</select>
		</td>
		<td>
			<input type="text" name="search" placeholder="Enter a Search Keyword" value="{{Request::get('search')}}" class="form-control">
		</td>
		<td><button type="submit" class="btn btn-success">Filter</button></td>
		@if(Request::has('paymentstatus'))
        <td><a href="/recharge/rechargeorders" class="btn btn-danger">Clear</a></td>
		@endif

	</tr>
	</form>
</table>
<table class="table table-responsive table-hover table-bordered table-striped">
	<tr class="bg-blue">
		<td class="text-center">DTH RECHARGES</td>
	</tr>
</table>

<div class="well" style="overflow-x:auto;">
<table class="table table-striped table-bordered table-hover table-responsive table-compact">
	<thead class="bg-navy">
		<tr>
			<th>ID</th>
			<th>UNIQUE ORDER ID</th>
			<th>CUSTOMER NAME</th>
			<th>BRAND</th>
			<th>CARD NO</th>
			<th>REGISTERED MOBILE NO</th>
			<th>AMOUNT</th>
			<th>RECHARGE STATUS</th>
			<th>PAYMENT STATUS</th>
			<th>RECHARGE API RESPONSE</th>
			<td>TIME</td>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		@foreach($rechargeorders as $rechargeorder)
		<tr>
			<td><a href="/viewdthrecharge/{{$rechargeorder->id}}" class="btn btn-primary">{{$rechargeorder->id}}</a></td>
			<td>{{$rechargeorder->uniqueoid}}</td>
			<td>{{$rechargeorder->name}}</td>
			<td>{{$rechargeorder->brandname}}</td>
			<td>{{$rechargeorder->cardno}}</td>
			<td>{{$rechargeorder->mobileno}}</td>
			<td>{{$rechargeorder->amount}}</td>
			 @if($rechargeorder->orderstatus=='PENDING')
			<td><span class="label label-primary">{{$rechargeorder->orderstatus}}</span></td>
			@elseif($rechargeorder->orderstatus=='SUCCESS')
              <td><span class="label label-success">{{$rechargeorder->orderstatus}}</span></td>
             @else
              <td><span class="label label-danger">{{$rechargeorder->orderstatus}}</span></td>
			@endif
			 @if($rechargeorder->paymentstatus=='PENDING')
			<td><span class="label label-primary">{{$rechargeorder->paymentstatus}}</span></td>
			@elseif($rechargeorder->paymentstatus=='PAID')
              <td><span class="label label-success">{{$rechargeorder->paymentstatus}}</span></td>
             @else
              <td><span class="label label-danger">{{$rechargeorder->paymentstatus}}</span></td>
			@endif
			<td>{{$rechargeorder->recharge_res_msg}}</td>
			<td>{{$rechargeorder->created_at}}</td>
			<td>
				<a href="/viewdthrecharge/{{$rechargeorder->id}}" class="btn btn-primary">VIEW</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{$rechargeorders->appends($data)->links()}}
</div>

  <script type="text/javascript">
  	function openModal(oid) {
	     	
	      $('#myModal').modal('show');
	      $("#roid").val(oid);
	}


function openreason(val)
{
	if(val=='FAILED')
	{
		$(".reason").show();
	}
	else
	{
		$(".reason").hide();
	}

}



  </script>


@endsection