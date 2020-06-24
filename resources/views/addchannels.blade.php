@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<form class="form-horizontal" action="/msetup/channels" role="form" method="POST" enctype="multipart/form-data" >
	{{csrf_field()}}
	<table class="table table-responsive table-hover table-bordered table-striped" >
		<tr>
			<td colspan="4" class="text-center bg-navy">CHANNEL DETAILS</td>
		</tr>
		<tr>
			<td>CHANNEL NAME<span style="color: red"> *</span></td>
			<td><input type="text" class="form-control" name="channelname" placeholder="ENTER CHANNEL NAME" required></td>
		</tr>
		<tr>
			<td>CHANNEL  CATEGORY<span style="color: red"> *</span></td>
			<td>
			<select class="form-control" name="channelcategory" required="">
				<option>Select a category</option>
				@foreach($categories as $category)

				<option value="{{$category->id}}">{{$category->categoryname}}</option>

				@endforeach
			</select>
			</td>
			
		</tr>
		<tr>
			<td>CHANNEL LOGO <span style="color: red"> *</span></td>
			<td><input type="file" name="channellogo" onchange="readURL(this);"></td>
			<td><img style="height:70px;width:95px;"  alt="no image" src="{{ asset('/img/channellogo/def.jpeg ')}}" id="imgshow"></td>
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
			<th>Channel Name</th>
			<th>Channel Category</th>
			<th>Channel Logo</th>
            <th>Edit</th>
            <th>Delete</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach($channels as $key => $channel)

		<tr>
			<td>{{$channel->id}}</td>
			<td>{{$channel->channelname}}</td>
			<td>{{$channel->categoryname}}</td>
			<td><img style="height:70px;width:95px;" src="{{ asset('/img/channellogo/'.$channel->channellogo )}}"></td>
            <td><a href="/msetup/channels/{{$channel->id}}/edit" class="btn btn-success">Edit</a></td>
			<form action="/msetup/channels/{{$channel->id}}" method="post">
				{{csrf_field()}}
				{{method_field('DELETE')}}
			<td><button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this details ?');">Delete</button></td>
			</form>
		</tr>
		@endforeach
	</tbody>
</table>

{{$channels->links()}}

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