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


<table class="table table-responsive table-hover table-bordered table-striped">
	<tr class="bg-blue">
		<td class="text-center">ALL TICKETS</td>
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
			<th>TYPE</th>
			<th>DESCRIPTION</th>
			<th>STATUS</th>
			<th>ACTION TAKEN</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tickets as $ticket)
		<tr>
		<td>{{$ticket->id}}</td>
		<td>{{$ticket->roid}}</td>
		<td>{{$ticket->name}}</td>
		<td>{{$ticket->mobile}}</td>
		<td>{{$ticket->type}}</td>
		<td>{{$ticket->description}}</td>
		<td>{{$ticket->status}}</td>
		<td>{{$ticket->action}}</td>
		<td>
		 @php
		   if($ticket->type=='MOB')
		   {
		   	$id=\App\Mobilerechargeorder::where('uniqueoid',$ticket->roid)->pluck('id')->first();
		   }
		   else{
            $id=\App\rechargeorder::where('uniqueoid',$ticket->roid)->pluck('id')->first();
		    }
		   

		 @endphp
			@if($ticket->type=='MOB')
			<a href="/viewmobilerecharge/{{$id}}" class="btn btn-primary" target="_blank">VIEW</a>
			@else
			<a href="/viewdthrecharge/{{$id}}" class="btn btn-primary" target="_blank">VIEW</a>
			@endif
			<button type="button" class="btn btn-info">ACTION</button>

		</td>

		</tr>
		@endforeach
	</tbody>
</table>
{{$tickets->links()}}
</div>


@endsection