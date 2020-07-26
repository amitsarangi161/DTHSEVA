@extends('layouts.frontend')
@section('content')
@section('sidemenucontent')
<style type="text/css">
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
<div class="row description-header text-center" style="background-color: gray;"><span>MY DTH RECHARGES</span></div>
          
@foreach($rechrgeorders as $rechrgeorder)
<div class="row rechargecls" style="margin-top: 10px;">
  <div class="panel panel-info panel-shadow">
    <div class="panel-heading">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-ms-4 col-xs-4">
          <img style="width: 60%;" class="img img-responsive " src="{{ asset('/img/brandlogo/'.$rechrgeorder->brandlogo )}}">
        </div>
        <div class="col-lg-8 col-md-8 col-ms-8 col-xs-8">
          <div class="row rechupr">
            <div class="col-lg-6 col-xs-6">
           <h5> {{$rechrgeorder->brandname}}</h5>
        </div>
        <div class="col-lg-6 col-xs-6">
          <h5>Rs. {{$rechrgeorder->amount}}</h5>
        </div>
          </div>
        <div class="row rechupr">
            <div class="col-md-6">
              <h5>Vc. No : {{$rechrgeorder->cardno}}</h5>
            </div>
            <div class="col-md-6">
              <h5>Mob. No : {{$rechrgeorder->mobileno}}</h5>
            </div>
        </div>
        </div>
        </div>
       
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-6  col-xs-6">Referance No. #{{$rechrgeorder->uniqueoid}}</div>
          <div class="col-md-6  col-xs-6">Date No. Date : {{$rechrgeorder->created_at}}</div>
        </div>
        <div class="row">
          @php
            if($rechrgeorder->paymentstatus=="PENDING"){
            $ps="info";
            }
            elseif($rechrgeorder->paymentstatus=="FAILED"){
            $ps="danger";
            }
            elseif($rechrgeorder->paymentstatus=="PAID"){
            $ps="success";
            }
       else{
       $ps="default";
     }
     if($rechrgeorder->orderstatus=="PENDING"){
            $os="info";
          }
         elseif($rechrgeorder->orderstatus=="FAILED"){
         $os="danger";
       }
       elseif($rechrgeorder->orderstatus=="SUCCESS"){
         $os="success";
       }
       else{
       $os="default";
     }
          @endphp
          <div class="col-md-6 col-xs-6">Payment Status : <span class="label label-{{$ps}}">{{$rechrgeorder->paymentstatus}}</span> </div>
          <div class="col-md-6 col-xs-6">Recharge Status : <span class="label label-{{$os}}">{{$rechrgeorder->orderstatus}}</span></div>
        </div>
        <div class="row" style="margin-top: 5px;">
          <div class="col-md-12 col-xs-12">
            <span class="pull-right help" onclick="opencontactus('{{$rechrgeorder->uniqueoid}}','DTH');"><i class="fa fa-question-circle"></i>
              Help</span>
            </div>
        </div>
      </div>
  </div> 
</div>

@endforeach         
<div class="col col-sm-6 col-md-4 text-right">
  <div class="pagination-container">
    {{$rechrgeorders->links()}}
  </div>
</div>  
<!-- @foreach($rechrgeorders as $rechrgeorder)
<div class="row order">
          <div class="pname">
       <b> <span class="productname">{{$rechrgeorder->brandname}}</span></b>
          <span style="float: right;">{{$rechrgeorder->orderstatus}}

               @if($rechrgeorder->orderstatus=="FAILED")
            <i title="{{$rechrgeorder->reason}}" class="fa fa-exclamation-circle" aria-hidden="true"></i>
                @endif
     
          </span>
          </div>
          <div class="col-sm-3 col-xs-12" style="float: left;text-align: center;">
           <img style="width: 60%; padding: 10px;" class="img img-responsive " src="{{ asset('/img/brandlogo/'.$rechrgeorder->brandlogo )}}">
           <br>
           <br>
           <strong>RS.{{$rechrgeorder->amount}}</strong>
          </div>
          <div class="col-sm-6 col-xs-12"  style="float: left;">
          
              <p>VC NO-{{$rechrgeorder->cardno}}</p>

              <p>MOBILE NO-{{$rechrgeorder->mobileno}}</p>
              

          </div>
          <div class="col-sm-3 col-xs-12" style="float: right;">
         
                      

                        <button type="button" onclick="opencontactus('{{$rechrgeorder->id}}');" class="btn btn-primary btn-flat form-control orderbtn">contact us</button>
                          

                         

                   
          
          
          
          
          
          </div>
</div>


@endforeach -->




@endsection
@include('layouts.sidemenu')
@endsection