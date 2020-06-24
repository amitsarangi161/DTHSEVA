@extends('layouts.app')
@section('content')

<style type="text/css">
	.thumb-image
	{
		height: 100px;
		width: 100px;
	}
</style>


<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/psetup/coupon">
{{ csrf_field() }}
	<table class="table table-responsive table-hover table-bordered table-striped" >
		<tr>
			<td colspan="4" class="text-center bg-navy">ADD COUPON</td>
		</tr>
		<tr>
			<td>COUPON NAME<span style="color: red"> *</span></td>
			<td><input  class="form-control" name="couponname" placeholder="Enter Coupon name" required></td>
		</tr>
		<tr>
			<td>COUPON AMOUNT<span style="color: red"> *</span></td>
			<td><input  class="form-control" name="amount" placeholder="Enter Amount" required></td>
		</tr>
		
		
						  
</table>
<table>
		<tr>
			<td colspan="4">
				
				<button class="btn btn-success" style="float: right; " type="submit">Add Coupon</button>
			</td>
		</tr>
		

	</table>
</form>
<table class="table table-striped table-bordered table-hover table-responsive table-compact">
	<thead class="bg-navy">
		<tr>
			<td>ID</td>
			<td>COUPON CODE</td>
			<td>AMOUNT</td>
			<td>EDIT</td>
			<td>DELETE</td>
		</tr>
	</thead>
	<tbody>
		@foreach($coupons as $coupon)
		<tr>
			<td>{{$coupon->id}}</td>
			<td>{{$coupon->couponname}}</td>
			<td>{{$coupon->amount}}</td>
			<td>
				<a href="/psetup/coupon/{{$coupon->id}}/edit" class="btn btn-primary">EDIT</a>
			</td>
			<td>
				<form action="/psetup/coupon/{{$coupon->id}}" method="POST">
					{{csrf_field()}}
					{{method_field('DELETE')}}
				<button type="submit" class="btn btn-danger" onclick="return confirm('Dou You want to Delete This Coupon Code');">DELETE</button>
			    </form>
			</td>

			
		</tr>
		@endforeach
	</tbody>
</table>
{{$coupons->links()}}
@endsection


