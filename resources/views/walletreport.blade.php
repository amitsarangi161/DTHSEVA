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
      <select name="name" required="" class="form-control select2">
        <option value="">Select a Customer</option>
        @foreach($customernames as $customername)
        <option value="{{$customername->id}}">{{$customername->name}}/{{$customername->mobile}}</option>
        @endforeach
      </select>
    </td>
  
    <td><button type="submit" class="btn btn-success">Check wallet Balance</button></td>
    @if(Request::has('name'))
        <td><a href="/reports/walletreport" class="btn btn-danger">Clear</a></td>
    @endif


  </tr>
  </form>
</table>
 <table class="table">
  <form action="/reports/walletreport" method="get">
  <tr>
    <td><strong>Enter search keyword</strong></td>

    <td>
      <input type="text" name="search" placeholder="Enter a Name/Mobile No" value="{{Request::get('search')}}" class="form-control" required="">
    </td>
    <td><button type="submit" class="btn btn-success">Filter</button></td>
    @if(Request::has('search'))
        <td><a href="/reports/walletreport" class="btn btn-danger">Clear</a></td>
    @endif

  </tr>
  </form>
</table>
<table class="table">
  <tr style="background-color: #2fd267">
     <td style="font-size: 20px;"><strong>TOTAL WALLET BALANCE</strong></td>
     <td style="font-size: 20px;">
      <strong>
      INR {{$totalbalance}}
      </strong>
     </td>
  </tr>
  
</table>
@if(sizeof($customers)>0)
<div class="well">
  <div class="table-responsive">
  <table class="table table-responsive table-hover table-bordered table-striped datatable1" width="100%">
    <thead>
        <tr class="bg-navy" style="font-size: 10px;">
            <th>ID</th>
            <th>CUSTOMER NAME</th>
            <th>CUSTOMER MOB</th>
            <th>CREDIT</th>
            <th>DEBIT</th>
            <th>BALANCE</th>
            <th>VIEW</th>
            
        </tr>
    </thead>
   <tbody>
       
      @foreach($customers as $customer)
       @php
         $w=\App\wallet::select('wallets.*')
                 ->where('user_id',$customer->id)
                 ->get();
          $totalcr=number_format((float)$w->sum('credit'), 2, '.', '');
          $totaldr=number_format((float)$w->sum('debit'), 2, '.', '');
          $totalbal=number_format((float)($w->sum('credit')-$w->sum('debit')), 2, '.', '');
          
       @endphp
      <tr>
        <td>{{$customer->id}}</td>
        <td>{{$customer->name}}</td>
        <td>{{$customer->mobile}}</td>
        <td>{{$totalcr}}</td>
        <td>{{$totaldr}}</td>
        <td>{{$totalbal}}</td>
         <td>
          <a href="/reports/walletreport?name=" class="btn btn-success">VIEW</a>
        </td>
        
       
      </tr>


      @endforeach
      
     
   </tbody>
    <tbody>
      <tr class="bg-green">
        <td></td>
        <td></td>
        <td>TOTAL</td>
        <td>{{$totalcredit}}</td>
        <td>{{$totaldebit}}</td>
        <td>{{$totalbalance}}</td>
        <td></td>
        
      </tr>
    </tbody>

</table>
    {{$customers->appends($data)->links()}} 
       
  
      

  
</div>
</div>



@endif


@if(sizeof($wallets)>0)
<div class="well">
  <div class="table-responsive">
  <table class="table table-responsive table-hover table-bordered table-striped datatable1" width="100%">
    <thead>
        <tr class="bg-navy" style="font-size: 10px;">
            <th>ID</th>
            <th>ORDER ID</th>
            <th>CREDIT</th>
            <th>DEBIT</th>
            <th>ADDED BY</th>
            <th>TYPE</th>
            <th>CREATED_AT</th>
        </tr>
    </thead>
   <tbody>
      @foreach($wallets as $wallet)
      <tr>
        <td>{{$wallet->id}}</td>
        <td>{{$wallet->order_id}}</td>
        <td>{{$wallet->credit}}</td>
        <td>{{$wallet->debit}}</td>
        <td>{{$wallet->name}}</td>
        <td>{{$wallet->type}}</td>
        <td>{{$wallet->created_at}}</td>
      </tr>

      @endforeach
     
   </tbody>
    <tbody>
      <tr>
        <td></td>
        <td>TOTAL</td>
        <td>{{$wallets->sum('credit')}}</td>
        <td>{{$wallets->sum('debit')}}</td>
        <td>BALANCE</td>
        <td>{{$wallets->sum('credit')-$wallets->sum('debit')}}</td>
        <td></td>
      </tr>
    </tbody>
</table>
   
       
  
      

  
</div>
</div>
@endif

@endsection