@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<form class="form-horizontal" action="/msetup/brands" role="form" method="POST" enctype="multipart/form-data" >
	{{csrf_field()}}
	<table class="table table-responsive table-hover table-bordered table-striped" >
		<tr>
			<td colspan="4" class="text-center bg-navy">BRAND DETAILS</td>
		</tr>
		<tr>
			<td>BRAND NAME<span style="color: red"> *</span></td>
			<td><input type="text" class="form-control" name="brandname" placeholder="ENTER BRAND NAME" required></td>
		</tr>
		<tr>
			<td>RECHARGE CODE<span style="color: red"> *</span></td>
			<td><input type="text" class="form-control" name="recharge_code" placeholder="ENTER RECHARGE CODE" required></td>
		</tr>
		<tr>
			<td>CASH BACK(IN %)<span style="color: red"> *</span></td>
			<td><input type="text" value="0" class="form-control" name="cashback_percent" placeholder="ENTER CASHBACK(IN %)" required></td>
		</tr>
		<tr>
			<td>LOGO <span style="color: red"> *</span></td>
			<td><input type="file" name="brandlogo" onchange="readURL(this);"></td>
			<td><img style="height:70px;width:95px;"  alt="no image" src="{{ asset('/img/productimage/def.jpeg ')}}" id="imgshow"></td>
		</tr>
		
		<tr>
			<td></td>
<td colspan="3"><input type="submit" value="Submit" class="btn btn-success" style="float: right ;"></td>
</tr>
</table>
</form>

<table class="table table-striped table-bordered table-hover table-responsive table-compact">
	<thead class="bg-navy">
		<tr>
			<th>Id</th>
			<th>Brand Name</th>
			<th>Recharge Code</th>
			<th>Cashback(in %)</th>
			<th>Brand Logo</th>
            <th>Edit</th>
           <!--  <th>Delete</th> -->
			
		</tr>
	</thead>
	<tbody>
		@foreach($brands as $key => $brand)

		<tr>
			<td>{{$brand->id}}</td>
			<td>{{$brand->brandname}}</td>
			<td>{{$brand->recharge_code}}</td>
			<td>{{$brand->cashback_percent}}</td>
			<td><img style="height:70px;width:95px;" src="{{ asset('/img/brandlogo/'.$brand->brandlogo )}}"></td>
            <td><a href="/msetup/brands/{{$brand->id}}/edit" class="btn btn-success">Edit</a></td>
	<!-- 		<form action="/msetup/brands/{{$brand->id}}" method="post">
				{{csrf_field()}}
				{{method_field('DELETE')}}
			<td><button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this details ?');">Delete</button></td>
			</form> -->
		</tr>
		@endforeach
	</tbody>
</table>

{{$brands->links()}}

<script type="text/javascript">



	function readURL(input) {
		

       if (input.files && input.files[0]) {
            var reader = new FileReader();
              
            reader.onload = function (e) {
                $('#imgshow')
                    .attr('src', e.target.result)
                    .width(95)
                    .height(70);
					
            };

            reader.readAsDataURL(input.files[0]);

        }
    }
</script>



@endsection