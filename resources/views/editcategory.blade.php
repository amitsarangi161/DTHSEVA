@extends('layouts.app')
@section('content')
    

<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/msetup/category/{{$category->id}}">
{{ csrf_field() }}
{{method_field('PUT')}}
	<table class="table table-responsive table-hover table-bordered table-striped" >
		<tr>
			<td colspan="4" class="text-center bg-navy">CATEGORY DETAILS</td>
		</tr>
		
		<tr>
			<td> CATEGORY NAME<span style="color: red"> *</span></td>
			<td><input id="cname" class="form-control" name="categoryname" value="{{$category->categoryname}}" required></td>
			
		</tr>
		

		<tr>

			<td>
				<button class="btn btn-danger" style="float: left;" type="button" >Cancel</button>
				<button class="btn btn-success" style="float: right ;" type="submit" >Update Category Details</button>
			</td>
		</tr>

	</table>
</form>




@endsection

