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
			@if($ticket->status !='RESOLVED')
			<button type="button" class="btn btn-info" onclick="openaction('{{$ticket->id}}','{{$ticket->status}}','{{$ticket->action}}')">ACTION</button>
			@else
			<button type="button" class="btn btn-danger">ACTION</button>
			@endif

		</td>

		</tr>
		@endforeach
	</tbody>
</table>
{{$tickets->links()}}
</div>

<div id="openactionmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>CHANGE STATUS</b></h4>
      </div>
      <div class="modal-body">
     <form action="/updaterechargeticket" method="post">
    {{csrf_field()}}
    <table class="table table-responsive table-hover table-bordered table-striped" >
        <tr>
            <td colspan="4" class="text-center bg-navy">CHANGE STATUS</td>
        </tr>
        <input type="hidden" name="uid" id="uid">
        
          <tr>
              <td>CHANGE STATUS<span style="color: red"> *</span></td>
            <td colspan="2">
              <select name="status" id="status" class="form-control"  required>
                  <option value="">Select a Status</option>
                  <option value="RESOLVED">PROCESSING</option>
                  <option value="RESOLVED">RESOLVED</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Action<span style="color: red"> *</span></td>
            <td colspan="2"><textarea class="form-control" autocomplete="off" id="action" name="action" required></textarea></td>
          </tr>

        <tr>
            <td></td>
<td colspan="3"><input type="submit" value="Submit" class="btn btn-success" style="float: right ;"></td>
</tr>
</table>
</form>

  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
	function openaction(id,status,action){
    $("#uid").val(id);
    $('#status option[value="'+status+'"]').attr("selected", "selected");
    $("#action").val(action);
    $('#openactionmodal').modal('show');
	}
</script>


@endsection