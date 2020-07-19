@extends('layouts.frontend')
@section('content')
@section('sidemenucontent')
<style type="text/css">
	.table-bordered th, .table-bordered td { border: 1px solid #ddd!important }
	table.table {
    width: auto;
    margin:0 auto;
}
.panel{
  border-radius: 0px!important;
}
.panel-shadow {
    box-shadow: 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12), 0 5px 5px -3px rgba(0, 0, 0, .2);
}
.panel-heading{
  background-color: #928db029!important;
}
.fa-question-circle{font-size: 16px;color: #238eae;}
@media (max-width: 375px){
  .rechargecls{font-size: 1rem;}
  .rechupr h5{font-size: 1rem;}
}
.help{
  cursor: pointer;
}
</style>
<div class="row description-header text-center" style="background-color: #767966;margin-bottom: 10px;"><span>MY WALLET</span>

<span class="pull-left">
   <button type="button" onclick="openaddMoney();" class="btn btn-primary">ADD MONEY</button>
</span>

<span class="pull-right">
    @php
    $bal=$wallets->sum('credit')-$wallets->sum('debit');
    @endphp
    <span class="label label-success">{{$bal}}</span>
</span>
</div>
@foreach($wallets as $wallet)
<div class="row rechargecls">
    <div class="panel panel-info panel-shadow">
        <div class="panel-body">
            <div class="row">
            <div class="col-lg-10 col-md-10 col-ms-10 col-xs-10">
                <div class="row">
                <div class="col-md-4 col-xs-4">
                    <span>Ref. Id : {{$wallet->order_id}}</span>
                </div>
                <div class="col-md-4 col-xs-4">
                   @if($wallet->type=='PRODUCTS')
                    product order
                    @else
                     {{$wallet->type}} recharge
                    @endif
                  
                </div>
                <div class="col-md-4 col-xs-4">
                    {{$wallet->created_at}}                  
                </div>
            </div>
            </div>
            <div class="col-lg-2 col-md-2 col-ms-2 col-xs-2">
                @if($wallet->credit > 0)
                    <span style="color:green">+{{$wallet->credit}}</span>
                    @else
                    <span style="color:red">-{{$wallet->debit}}</span>
                    @endif
            </div>
        </div>
        </div>
    </div>
</div>
@endforeach


<!-- <div class="table-responsive">
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
</div> -->
 
  <div class="modal fade" id="addMoney" role="dialog" data-backdrop="static" data-keyboard="false">
   

      
         <div class="container">
             <form action="/rechargewallet" method="POST">
                    {{csrf_field()}}
         <div class="row ">
           <div class="col-md-6 col-md-offset-3 ">
               <div class="order">
                <span id="msg1"></span>
    <div class="form-group">
        <label class="info-title" for="exampleInputEmail1">Enter Top-up Amount<span>*</span></label>
        <input type="number" class="form-control unicase-form-control text-input" name="amount" autocomplete="off" required="">
    </div>
   
    
    <div class="form-group">
    <button  class="btn btn-success" type="submit">SUBMIT</button>
    <button class="btn btn-danger" type="button" data-dismiss="modal">CANCEL</button>
       </div>
           </div>
         </div>
         </div>
     </form>
      </div>
      
      
  </div>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
    $('#example').dataTable();

    function openaddMoney() {
        $("#addMoney").modal('show');
    }
    </script>
@endsection
@include('layouts.sidemenu')

@endsection