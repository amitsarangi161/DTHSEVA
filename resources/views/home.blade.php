@extends('layouts.app')

@section('content')


<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$porders}}</h3>

              <p>Total Product Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/orders/productorders" class="small-box-footer">view all<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
   
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$customers}}</h3>

              <p>No Of Customer</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/customers/viewallcustomer" class="small-box-footer">view all <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$totalproducts}}</h3>

              <p>Total Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/psetup/viewallproduct" class="small-box-footer">view all<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$rorders}}</h3>

              <p>Total DTH Recharge Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/recharge/rechargeorders" class="small-box-footer">view all<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
              <h3>{{$mobrorders}}</h3>

              <p>Total Mobile Recharge Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/recharge/mobilerechargeorders" class="small-box-footer">view all<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3 id="onepaybalance">WAIT...</h3>

              <p>ONE PAY BALANCE</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="javascript:void(0)" onclick="refreshbal();" class="small-box-footer">Refresh<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
   
      
      </div>




      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a title="DTH Recharge Refund" href="/recharge/rechargeorders?paymentstatus=PAID&orderstatus=FAILED&search=">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-external-link-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">DTH Recharge Refund</span>
              <span class="info-box-number">{{$faileddthrechargeorders}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </a>
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a title="Mobile Recharge Refund" href="/recharge/mobilerechargeorders?paymentstatus=PAID&orderstatus=FAILED&search=">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-external-link-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mobile Recharge Refund</span>
              <span class="info-box-number">{{$failedmobilerechargeorders}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </a>
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
<script type="text/javascript">
  getBlance();
  function refreshbal()
  {

   getBlance();
  }
  function getBlance()
  {
        $("#onepaybalance").html('WAIT...');
       $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
        });

        $.ajax({
               type:'POST',
              
               url:'{{url("/getOnepayBalance")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",
    
                     },

               success:function(data) {
                   console.log(data);
                   $("#onepaybalance").html('INR '+data);
               }
             });
  }
         
      </script>
@endsection

