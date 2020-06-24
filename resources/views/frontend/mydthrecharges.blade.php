@extends('layouts.frontend')
@section('content')
@section('sidemenucontent')
<div class="row description-header text-center" style="background-color: gray;"><span>MY DTH RECHARGES</span></div>
          
          
@foreach($rechrgeorders as $rechrgeorder)
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


@endforeach




@endsection
@include('layouts.sidemenu')
@endsection