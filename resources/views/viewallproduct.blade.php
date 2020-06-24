@extends('layouts.app')
@section('content')
<div style="overflow-x:auto;">
<table  class="table table-striped table-bordered table-hover table-responsive table-compact">

	<thead class="bg-navy">
       <tr>
       	<th>ID</th>
       	<th>PRODUCT NAME</th>
       	<th>COST</th>
       	<th>PROMO COST</th>
       	<th>BOOKING AMOUNT</th>
       	<th>INSTALLATION AMOUNT</th>
       	<th>SHORT DESCRIPTION</th>
       	<th>BRAND</th>
       	<th>COVER IMAGE</th>
       	<th>IMG1</th>
       	<th>IMG2</th>
       	<th>IMG3</th>
        <th>EDIT</th>
        <th>DELETE</th>


       </tr>

	</thead>
	<tbody>
		@foreach($products as $product)
		<tr>
			<td>{{$product->id}}</td>
			<td>{{$product->name}}</td>
			<td>{{$product->cost}}</td>
			<td>{{$product->promocost}}</td>
			<td>{{$product->bookingamount}}</td>
			<td>{{$product->installamt}}</td>
			<td>{{$product->shortdescription}}</td>
			<td>{{$product->brandname}}</td>
			<td><img style="height:70px;width:95px;" src="{{ asset('/img/productimage/'.$product->image1 )}}"></td>
			<td><img style="height:70px;width:95px;" src="{{ asset('/img/productimage/'.$product->image2 )}}"></td>
			<td><img style="height:70px;width:95px;" src="{{ asset('/img/productimage/'.$product->image3 )}}"></td>
			<td><img style="height:70px;width:95px;" src="{{ asset('/img/productimage/'.$product->image4 )}}"></td>
			<td><a href="/psetup/product/{{$product->id}}/edit" class="btn btn-primary">EDIT</a></td>
			<form action="/psetup/product/{{$product->id}}" method="POST">
				{{csrf_field()}}
				{{method_field('DELETE')}}
			<td><button class="btn btn-danger" onclick="return confirm('Do you want to delete this product?')">DELETE</button></td>
		    </form>
               
			
		</tr>
		@endforeach
	</tbody>
	


</table>
</div>

{{$products->links()}}

@endsection