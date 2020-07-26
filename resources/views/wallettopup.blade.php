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
	<form action="/recharge/wallettop-up" method="get">
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
        <td><a href="/recharge/wallettop-up" class="btn btn-danger">Clear</a></td>
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
			<th>CUSTOMER MOB</th>
			<th>AMOUNT</th>
			<th>ORDER STATUS</th>
			<th>PAYMENT STATUS</th>
		    <th>CREATED_AT</th>	
		    <th>VIEW</th>	
		</tr>
	</thead>
	<tbody>
		@foreach($rechargeorders as $rechargeorder)
		<tr>
			<td>{{$rechargeorder->id}}</td>
			<td>{{$rechargeorder->uniqueoid}}</td>
			<td>{{$rechargeorder->name}}</td>
			<td>{{$rechargeorder->mobile}}</td>
			<td>{{$rechargeorder->amounttopay}}</td>
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
			<td>{{$rechargeorder->created_at}}</td>
			<td>
				<a href="/viewwallettopup/{{$rechargeorder->id}}" class="btn btn-success">VIEW</a>
			</td>
		</tr>
		@endforeach
		
	</tbody>
	<tfoot>
		<tr class="bg-black">
			<td></td>
			<td></td>
			<td></td>
			<td>TOTAL</td>
			<td>{{$sum}}</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tfoot>
</table>
{{$rechargeorders->appends($data)->links()}}
</div>



@endsection