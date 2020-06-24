@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<form class="form-horizontal" action="salechannels" role="form" method="POST" enctype="multipart/form-data" >
	{{csrf_field()}}
	<table class="table table-responsive table-hover table-bordered table-striped" >
		<tr>
			<td colspan="4" class="text-center bg-navy">SALES CHANNEL DETAILS</td>
		</tr>
	<tr>
			<td>Select Channel Brand<span style="color: red"> *</span></td>
			<td>
			<select class="form-control" name="brand" required="">
				<option>Select a brand</option>
				@foreach($brands as $brand)

				<option value="{{$brand->id}}">{{$brand->brandname}}</option>

				@endforeach
			</select>
			</td>
			
		</tr>
		<tr>
			<td>Select a Channel<span style="color: red"> *</span></td>
			<td>
			<select class="form-control" name="channelid" required="">
				<option>Select a channel</option>
				@foreach($channels as $channel)

				<option value="{{$channel->id}}">{{$channel->channelname}}</option>

				@endforeach
			</select>
			</td>
			
		</tr>
		<tr>
			<td>Channel Cost<span style="color: red"> *</span></td>
			<td><input type="text" name="channelcost" class="form-control" placeholder="Channel Cost" required></td>
			
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
			<th>Channel Brand</th>
			<th>Channel Name</th>
			<th>Channel Cost</th>
            <th>Edit</th>
            <th>Delete</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach($saleschannels as $key => $saleschannel)

		<tr>
			<td>{{$saleschannel->id}}</td>
			<td>{{$saleschannel->brandname}}</td>
			<td>{{$saleschannel->channelname}}</td>
			<td>{{$saleschannel->channelcost}}</td>
			
            <td><a href="/psetup/salechannels/{{$saleschannel->id}}/edit" class="btn btn-success">Edit</a></td>
			<form action="/psetup/salechannels/{{$saleschannel->id}}" method="post">
				{{csrf_field()}}
				{{method_field('DELETE')}}
			<td><button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this details ?');">Delete</button></td>
			</form>
		</tr>
		@endforeach
	</tbody>
</table>

{{$saleschannels->links()}}





@endsection