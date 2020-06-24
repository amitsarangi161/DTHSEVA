@extends('layouts.app')

@section('content')
<div style="overflow-x:auto;">
<table  class="table table-striped table-bordered table-hover table-responsive table-compact">

	<thead class="bg-navy">
		<tr>
			<th>Id</th>
			<th>Package Name</th>
			<th>Package Brand</th>
			<th>Package Cost</th>
			<th>Package Description</th>
			<th>Package Image</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			@foreach($packages as $package)
            <tr>
            	<td>{{$package->id}}</td>
            	<td>{{$package->brandname}}</td>
            	<td>{{$package->packagename}}</td>
            	<td>{{$package->packagecost}}</td>
            	<td>{{$package->packagedescription}}</td>
            	<td><img style="height:70px;width:95px;" src="{{ asset('/img/packageimage/'.$package->packageimage )}}"></td>
            	<td><a href="/editpackage/{{$package->id}}/edit" class="btn btn-primary">Edit</a></td>
            	<form action="/deletepackage/{{$package->id}}" method="POST">
            		{{csrf_field()}}
            		{{method_field('DELETE')}}
            	<td>
            		<button type="submit" class="btn btn-danger" onclick="return confirm('Do You Want to delete this package?')">Delete</button>
            	</td>
               </form>
            </tr>


			@endforeach
		</tr>
	</tbody>
</table>
</div>
{{$packages->links()}}

@endsection