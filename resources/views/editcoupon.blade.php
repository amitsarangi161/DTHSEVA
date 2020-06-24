@extends('layouts.app')
@section('content')

<style type="text/css">
	.thumb-image
	{
		height: 100px;
		width: 100px;
	}
</style>


<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/psetup/coupon/{{$coupon->id}}">
{{ csrf_field() }}
{{method_field('PUT')}}

	<table class="table table-responsive table-hover table-bordered table-striped" >
		<tr>
			<td colspan="4" class="text-center bg-navy">EDIT COUPON</td>
		</tr>
		<tr>
			<td>COUPON NAME<span style="color: red"> *</span></td>
			<td><input  class="form-control" name="couponname" value="{{$coupon->couponname}}" required></td>
		</tr>
		<tr>
			<td>COUPON AMOUNT<span style="color: red"> *</span></td>
			<td><input  class="form-control" name="amount" value="{{$coupon->amount}}" required></td>
		</tr>


		
		
						  
</table>
<table>
		<tr>
			<td colspan="4">
				
				<button class="btn btn-success" style="float: right; " type="submit">Update</button>
			</td>
		</tr>
		

	</table>
</form>

@endsection


