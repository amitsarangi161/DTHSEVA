@extends('layouts.app')
@section('content')
<table class="table table-responsive table-hover table-bordered table-striped">
	<tr class="bg-blue">
		<td class="text-center">One Pay Report</td>
	</tr>
</table>

<table class="table">
  <form action="/reports/onepayreport" method="get">
  <tr>
    <td>FROM</td>
    <td><input placeholder="From Date" type="text" name="fromdate" class="form-control datepicker" value="{{Request('fromdate')}}" autocomplete="off"></td>
    <td>TO</td>
    <td><input placeholder="To Date" type="text" name="todate" class="form-control datepicker" value="{{Request('todate')}}" autocomplete="off"></td>

    <td><strong>SELECT A STATUS</strong></td>
    <td>
      <select name="stmsg" required="" class="form-control">
        <option value="ALL" {{(Request('stmsg')=='ALL')?'selected':''}}>ALL</option>
        @foreach($statuses as $status)
        
        <option value="{{$status->stmsg}}" {{(Request('stmsg')==$status->stmsg)?'selected':''}}>{{$status->stmsg}}</option>

        @endforeach
      </select>
    </td>
    <td>
      <input type="text" name="search" placeholder="Enter a Search Keyword" value="{{Request::get('search')}}" class="form-control">
    </td>
    <td><button type="submit" class="btn btn-success">Filter</button></td>
    @if(Request::has('search'))
        <td><a href="/reports/onepayreport" class="btn btn-danger">Clear</a></td>
    @endif

  </tr>
  </form>
</table>
@if($onepayresponses)
<div class="well">
  <div class="table-responsive">
  <table class="table table-responsive table-hover table-bordered table-striped">
     <thead>
      <tr class="bg-navy">
        <th>ID</th>
        <th>TNO</th>
         <th>ST</th>
         <th>STMSG</th>
         <th>TID</th>
         <th>OPRTID</th>
         <th>Mobile</th>
         <th>PRB</th>
         <th>Amount</th>
         <th>POB</th>
         <th>DP</th>
         <th>DR</th>
         <th>CB</th>
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
         <td>{{$onepayresponse->prb}}</td>
         <td>{{$onepayresponse->amount}}</td>
         <td>{{$onepayresponse->pob}}</td>
         <td>{{$onepayresponse->dp}}</td>
         <td>{{$onepayresponse->dr}}</td>
         <td>{{$onepayresponse->pob+$onepayresponse->dr}}</td>
         <td>{{$onepayresponse->created_at}}</td>
      </tr>
      @endforeach
     </tbody>
    
  </table>
   
       
  
      

  
</div>
</div>
@else
 <h3>NO RESULT</h3>

@endif

			
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
  $(".datepicker").datepicker({
   dateFormat: 'yy-mm-dd',
       showButtonPanel: true,
       changeYear: true,
       changeMonth: true,
       maxDate: new Date(),
       });
</script>

@endsection