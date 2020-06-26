@extends('layouts.app')
@section('content')

<table class="table table-responsive table-hover table-bordered table-striped">
	<tr class="bg-blue">
		<td class="text-center">Customer Wallet Report</td>
	</tr>
</table>

<table class="table">
  <form action="/reports/walletreport" method="get">
  <tr>

    <td><strong>SELECT Name</strong></td>
    <td>
      <select name="name" required="" class="form-control">
        <option value="ALL" {{(Request('name')=='ALL')?'selected':''}}>ALL</option>
        @foreach($customernames as $customername)
        <option value="{{$customername->name}}">{{$customername->name}}</option>
        @endforeach
      </select>
    </td>
    <td>
      <input type="text" name="search" placeholder="Enter a Search Keyword" value="{{Request::get('search')}}" class="form-control">
    </td>
    <td><button type="submit" class="btn btn-success">Check Balance</button></td>
    @if(Request::has('search'))
        <td><a href="/reports/walletreport" class="btn btn-danger">Clear</a></td>
    @endif

    <td><i class="fa fa-credit-card" aria-hidden="true"></i> INR. 10000000</td>

  </tr>
  </form>
</table>

<div class="well">
  <div class="table-responsive">
  <table class="table table-responsive table-hover table-bordered table-striped datatable1" width="100%">
    <thead>
        <tr class="bg-navy" style="font-size: 10px;">
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>MOBILE</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
         <tr style="font-size: 12px;">
             <td>{{$customer->id}}</td>
             <td>{{$customer->name}}</td>
             <td>{{$customer->email}}</td>
             <td>{{$customer->mobile}}</td>
         </tr>

        @endforeach
    </tbody>
</table>
   
       
  
      

  
</div>
</div>


@endsection