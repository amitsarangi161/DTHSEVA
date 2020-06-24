@extends('layouts.frontend')
@section('content')
@section('sidemenucontent')
<style type="text/css">
	.table-bordered th, .table-bordered td { border: 1px solid #ddd!important }
	table.table {
    width: auto;
    margin:0 auto;
}

</style>
<div class="row description-header text-center" style="background-color: gray;"><span>MY WALLET</span></div>

<div class="table-responsive">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Sl.no</th>
                <th>Order Id</th>
                <th>Order Type</th>
                <th>Cashback</th>
                <th>Created_At</th>
                
            </tr>
       </thead>
        <tbody>
        	@foreach($wallets as $key=>$wallet)
             <tr>
             	<td>{{++$key}}</td>
             	<td>{{$wallet->order_id}}</td>
             	<td>
             		@if($wallet->type=='PRODUCTS')
             		PRODUCT ORDER
                    @else
                     {{$wallet->type}} RECHARGE
                    @endif

             	</td>
             	<td>
             		@if($wallet->credit > 0)
             		<span style="color:green">+{{$wallet->credit}}</span>
             		@else
             		<span style="color:red">-{{$wallet->debit}}</span>
             		@endif
             	</td>
             	<td>{{$wallet->created_at}}</td>
             </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
            	<td></td>
            	<td></td>
            	<td>Wallet Balance</td>
            	<td>{{$wallets->sum('credit')-$wallets->sum('debit')}}</td>


                
            </tr>
        </tfoot>
    </table>
</div>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
    $('#example').dataTable();
    </script>
@endsection
@include('layouts.sidemenu')

@endsection