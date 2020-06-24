@extends('layouts.frontend')
@section('content')
@section('sidemenucontent')
     <div class="row description-header text-center" style="background-color: gray;"><span>MY ORDERS</span></div>
          @if(Session::has('thankmsg'))
                   <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('thankmsg') }}</p>
                   @endif
          
@foreach($orders as $order)
<div class="row order">
          <div class="pname">ORDER ID: #{{$order->id}}
        <a href="/products/{{$order->productname}}/{{$order->productid}}" target="_blank"><b> <span class="productname">{{$order->productname}}</span></b></a>
        
        @if($order->orderstatus!="CANCELLED" && $order->orderstatus !="CANCELLED BY SELLER")
          <span style="float: right;color: #fff;background: #0f8060;padding: 4px;border-radius: 5px;">{{$order->orderstatus}}</span>
         @else
           <span style="float: right;color: #fff;background: #ed5353;padding: 4px;border-radius: 5px;" >{{$order->orderstatus}}</span>
         @endif
         
          @if($order->paymentstatus=="PENDING") 
          @if( $order->orderstatus!="CANCELLED" && $order->orderstatus !="CANCELLED BY SELLER")
          <a href="/paymentgateway/{{base64_encode($order->id)}}" style=" text-transform: capitalize !important;margin: 0px 14px; float: right !important;color: #fff !important;background: #0e5480  !important;padding: 4px !important;border-radius: 5px !important;">Payment Pending !! Retry ?</a>
        
         @endif
         @endif
          </div>
          <div class="col-sm-3 col-xs-12" style="float: left;">
          <img style="width: 60%; padding: 10px;" class="img img-responsive " src="{{ asset('/img/productimage/'.$order->image1 )}}">
          </div>
          <div class="col-sm-6 col-xs-12"  style="float: left;">
          <b style='color:#ef7b19'>  Order placed:</b><strong>{{$order->updated_at}}</strong><br>
          <strong>{{$order->name}}</strong>

             <p>{{$order->address}}</p>
              <p>{{$order->mobile}}</p>
              <p>{{$order->city}}</p>
              <p>{{$order->state}}</p>
              <p>{{$order->pincode}}</p>
                     
          </div>
          <div class="col-sm-3 col-xs-12" style="float: right;">
                         @php
                             $reviewcount=App\review::where('customerid',Session::get('userid')['uid'])
                             ->where('orderid',$order->id)
                             ->where('productid',$order->productid)
                             ->count();
                          @endphp

                         @if($order->orderstatus !="CANCELLED" && $order->orderstatus !="CANCELLED BY SELLER")

                             @if($order->orderstatus !="DISPATCHED" && $order->orderstatus !="DELIVERED"  )
                             <button type="button"  onclick="cancelOrder('{{$order->id}}','{{$order->productid}}','{{$order->productname}}');"  class="btn btn-danger btn-flat form-control orderbtn"> CANCEL ORDER</button>
                              
                            


                             @elseif($order->orderstatus =="DELIVERED")
                               <button class="btn btn-primary btn-flat form-control orderbtn"> INVOICE</button> 
                              
                                     @if($reviewcount==0)
                                <button type="button" onclick="review('{{$order->id}}','{{$order->productid}}');" class="btn btn-info btn-flat form-control orderbtn"> Review</button>
                                      @else
                                    <button class="btn btn-primary btn-flat form-control orderbtn" disabled=""> Already Reviewed</button>

                                      @endif

                               @else

                              @endif
                         @endif
 
          </div>
</div>
@endforeach




@endsection
@include('layouts.sidemenu')
@endsection