@extends('layouts.frontend')
@section('content')
@section('sidemenucontent')
<h1>User Dashboard</h1>

<div class="table-responsive-md">
                <table class="table table-hover border">
                  <thead class="thead-light">
                    <tr>
                      <th>Date</th>
                      <th>Description</th>
                      <th>Order ID</th>
                      <th class="text-center">Payment Status</th>
                      <th class="text-center">Order Status</th>
                      <th class="text-right">Amount</th>
                      <th class="text-center"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-middle">06/06/2018</td>
                      <td class="align-middle"><img src="images/brands/operator/vodafone.jpg" class="img-thumbnail d-inline-flex mr-1"> <span class="text-1 d-inline-flex">Recharge of Vodafone Mobile 9696969696</span></td>
                      <td class="align-middle">5286977475</td>
                      <td class="align-middle text-center"><i class="fa fa-check-circle text-4 text-success" data-toggle="tooltip" data-original-title="Your order is Successful"></i></td>
                      <td class="align-middle text-center"><i class="fa fa-check-circle text-4 text-success" data-toggle="tooltip" data-original-title="Your order is Successful"></i></td>
                      <td class="align-middle text-right">$150</td>
                      <td class="align-middle text-center"><a href="#" data-toggle="tooltip" data-original-title="Repeat Order"><i class="fas fa-redo-alt"></i></a></td>
                    </tr>
                   
                  
                  </tbody>
                </table>
              </div>


@endsection
@include('layouts.sidemenu')
@endsection