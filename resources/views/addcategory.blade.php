@extends('layouts.app')
@section('content')
    

<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/msetup/category">
{{ csrf_field() }}
	<table class="table table-responsive table-hover table-bordered table-striped" >
		<tr>
			<td colspan="4" class="text-center bg-navy">CATEGORY DETAILS</td>
		</tr>
		
		<tr>
			<td> CATEGORY NAME<span style="color: red"> *</span></td>
			<td><input id="cname" class="form-control" name="categoryname" placeholder="CATEGORY NAME" required></td>
			
		</tr>
		

		<tr>

			<td>
				<button class="btn btn-danger" style="float: left;" type="button" >Cancel</button>
				<button class="btn btn-success" style="float: right ;" type="submit">Add Category Details</button>
			</td>
		</tr>

	</table>
</form>
<table class="table table-striped table-bordered table-hover table-responsive table-compact">
	<thead class="bg-navy">
	
		<th>ID</th>
		<th>CATEGORY NAME</th>
		<th>EDIT</th>
		<th>DELETE</th>
	</thead>
	<tbody>
		
		@foreach($categories as $key => $category)
		<tr>
			
			<td>{{$category->id}}</td>
			<td>{{$category->categoryname}}</td>
			<td><a href="/msetup/category/{{$category->id}}/edit" class="btn btn-success">Edit</a></td>
			<form action="/msetup/category/{{$category->id}}" method="post">
				{{csrf_field()}}
				{{method_field('DELETE')}}
			<td><button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this details ?');">Delete</button></td>
			</form>
		
		</tr>
		@endforeach
	</tbody>




</table>
{{ $categories->links() }}



@endsection


