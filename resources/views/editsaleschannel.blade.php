@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<form class="form-horizontal" action="/psetup/salechannels/{{$saleschannel->id}}" role="form" method="POST" enctype="multipart/form-data" >
	{{csrf_field()}}
	{{method_field('PUT')}}
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

				<option value="{{$brand->id}}  "{{$saleschannel->brand==$brand->id ? 'selected="selected"':''}}>{{$brand->brandname}}</option>

				@endforeach
			</select>
			</td>
			
		</tr>
		<tr>
			<td>Select a Channel<span style="color: red"> *</span></td>
			<td>
			<select class="form-control" name="channelid" required="">
				<option>Select a Channel</option>
				@foreach($channels as $channel)

				<option value="{{$channel->id}}"  {{$saleschannel->channelid==$channel->id ? 'selected="selected"':''}}>{{$channel->channelname}}</option>

				@endforeach
			</select>
			</td>
			
		</tr>
		<tr>
			<td>Channel Cost<span style="color: red"> *</span></td>
			<td><input type="text" name="channelcost" class="form-control" value="{{$saleschannel->channelcost}}" required></td>
			
		</tr>
		
		<tr>
			<td></td>
<td colspan="3"><input type="submit" value="Submit" class="btn btn-success" style="float: right ;"></td>
</tr>
</table>
</form>





@endsection